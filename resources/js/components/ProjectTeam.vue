<template>
    <div>
        <button type="button" class="btn btn-xs btn-secondary" style="text-align:right; float:right;" @click="createProjectTeamMember(participantId)">Ajouter</button>
        <table class="table table-sm table-hover table-borderless">
            <thead>
            <tr>
                <th>#</th>
                <th>Noms</th>
                <th>Prénoms</th>
                <th>Age</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Profil</th>
                <th>Expérience (années)</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(member, idx) in projectTeam" :key="member.id">
                <th scope="row">{{ member.id }}</th>
                <td>{{ member.nom }}</td>
                <td>{{ member.prenom }}</td>
                <td>{{ member.age }}</td>
                <td>{{ member.email }}</td>
                <td>{{ member.phone }}</td>
                <td>{{ member.profil }}</td>
                <td>{{ member.experience }}</td>
            </tr>
            </tbody>
        </table>

        <project-team-form></project-team-form>
    </div>
</template>

<script>
    import ProjectTeamBus from './projectTeamBus'

    export default {
        name: "ProjectTeam",
        props: {
            projectTeam_prop: [],
            participantId_prop: {
                type: String,
                default: "0"
            }
        },
        components: {
            projectTeamForm: () => import('./ProjectTeamForm')
        },
        mounted() {
            ProjectTeamBus.$on('projectteammember_created', (add_data) => {
                this.addProjectTeamMember(add_data.projectteammember)
            })

            this.$on('projectteammember_deleted', (projectteammember) => {
                this.deleteProjectTeamMember(projectteammember);
            })

            this.$on('projectteammember_updated', (projectteammember) => {
                this.updateProjectTeamMember(projectteammember);
            })
        },
        data() {
            return {
                projectTeam: this.projectTeam_prop,
                participantId: this.participantId_prop
            }
        },
        methods: {
            createProjectTeamMember(participantId) {
                ProjectTeamBus.$emit('projectteammember_create', participantId)
            },
            editProjectTeamMember(projectteammember) {
                ProjectTeamBus.$emit('projectteammember_edit', projectteammember, projectteammember.participantId)
            },
            updateProjectTeamMember(projectteammember) {
                // we get the index of the modified task
                let teamMemberIndex = this.projectTeam.findIndex(t => {
                    return projectteammember.id === t.id
                })
                this.projectTeam.splice(teamMemberIndex, 1, projectteammember)

                this.$swal({
                    html: '<small>Membre modifié avec succès !</small>',
                    icon: 'success',
                    timer: 3000
                }).then(() => {
                    this.sendProjectTeam()
                })
            },
            addProjectTeamMember(projectteammember) {
                console.log("addProjectTeamMember: ", projectteammember, this.projectTeam)

                this.projectTeam.push(projectteammember)
                this.$swal({
                    html: '<small>Membre ajouté avec succès !</small>',
                    icon: 'success',
                    timer: 3000
                }).then(() => {
                    this.sendProjectTeam()
                })
            },
            deleteProjectTeamMember(projectteammember) {
                let teamMemberIndex = this.projectTeam.findIndex(t => {
                    return projectteammember.id === t.id
                })
                // if this task exists, it is removed from list
                if (teamMemberIndex !== -1) {

                    this.projectTeam.splice(teamMemberIndex, 1)

                    this.$swal({
                        html: '<small>Membre supprimé avec succès !</small>',
                        icon: 'success',
                        timer: 3000
                    }).then(() => {
                        this.sendProjectTeam()
                    })
                }
            },
            sendProjectTeam() {
                let projectteam = this.projectTeam
                ProjectTeamBus.$emit('projectteam_edited', {"list":projectteam})
            }
        }
    }
</script>

<style scoped>
    th {
        font-size: 8px;
        font-weight: bold;
    }
    td {
        font-size: xx-small;
        font-weight: lighter;
    }
</style>
