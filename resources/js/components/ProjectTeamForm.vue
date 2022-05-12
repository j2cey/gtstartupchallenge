<template>
    <!-- Modal - Default -->
    <div class="modal fade" id="projectteamformModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ projectTeamFormTitle }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form class="form-horizontal" @submit.prevent @keydown="projectTeamMemberForm.errors.clear()">

                        <div class="form-group">
                            <input class="form-control form-control-sm" type="text" name="nom" placeholder="Nom" v-model="projectTeamMemberForm.nom">
                            <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="projectTeamMemberForm.errors.has('nom')" v-text="projectTeamMemberForm.errors.get('nom')"></small></p>
                        </div>

                        <div class="form-group">
                            <input class="form-control form-control-sm" type="text" name="prenom" placeholder="Prénom" v-model="projectTeamMemberForm.prenom">
                            <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="projectTeamMemberForm.errors.has('prenom')" v-text="projectTeamMemberForm.errors.get('prenom')"></small></p>
                        </div>

                        <div class="form-group">
                            <input class="form-control form-control-sm" type="text" name="age" placeholder="Age" v-model="projectTeamMemberForm.age">
                            <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="projectTeamMemberForm.errors.has('age')" v-text="projectTeamMemberForm.errors.get('age')"></small></p>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="email" class="form-control form-control-sm" placeholder="Email" aria-describedby="basic-addon4" v-model="projectTeamMemberForm.email">
                                <span class="input-group-addon" id="basic-addon4"><i class="ti-email"></i></span>
                            </div>
                            <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="projectTeamMemberForm.errors.has('email')" v-text="projectTeamMemberForm.errors.get('email')"></small></p>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="phone" class="form-control form-control-sm" placeholder="Téléphone" aria-describedby="basic-addon5" v-model="projectTeamMemberForm.phone">
                                <span class="input-group-addon" id="basic-addon5"><i class="ti-mobile"></i></span>
                            </div>
                            <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="projectTeamMemberForm.errors.has('phone')" v-text="projectTeamMemberForm.errors.get('phone')"></small></p>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="profil" class="form-control form-control-sm" placeholder="Profil" aria-describedby="basic-addon5" v-model="projectTeamMemberForm.profil">
                                <span class="input-group-addon" id="basic-addon6"><i class="ti-user"></i></span>
                            </div>
                            <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="projectTeamMemberForm.errors.has('profil')" v-text="projectTeamMemberForm.errors.get('profil')"></small></p>
                        </div>

                        <div class="form-group">
                            <input class="form-control form-control-sm" type="text" name="experience" placeholder="Expérience" v-model="projectTeamMemberForm.experience">
                            <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="projectTeamMemberForm.errors.has('experience')" v-text="projectTeamMemberForm.errors.get('experience')"></small></p>
                        </div>

                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-xs btn-primary" @click="createProjectTeamMember(participantId)" :disabled="!isValidForm">Valider</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ProjectTeamBus from './projectTeamBus'
    class ProjectTeamMember {
        constructor(projectTeamMember) {
            this.id = projectTeamMember.id || 0
            this.nom = projectTeamMember.nom || ''
            this.prenom = projectTeamMember.prenom || ''
            this.age = projectTeamMember.age || ''
            this.email = projectTeamMember.email || ''
            this.phone = projectTeamMember.phone || ''
            this.profil = projectTeamMember.profil || ''
            this.experience = projectTeamMember.experience || ''
            this.participant_id = projectTeamMember.participant_id || ''
        }
    }
    export default {
        name: "ProjectTeamForm",
        mounted() {
            ProjectTeamBus.$on('projectteammember_create', (participantId) => {
                this.editing = false
                this.participantId = participantId
                this.projectTeamMember = new ProjectTeamMember({})
                this.projectTeamMember.participant_id = participantId
                this.projectTeamMemberForm = new Form(this.projectTeamMember)
                $('#projectteamformModal').modal()
            })
            ProjectTeamBus.$on('projectteammember_edit', (projectteammember) => {
                this.editing = true
                this.projectTeamFormTitle = "Modification Membre Projet"

                this.projectTeamMember = new ProjectTeamMember(projectteammember)
                this.projectTeamMemberForm = new Form(this.projectTeamMember)
                this.projectTeamMemberId = projectteammember.uuid

                $('#projectteamformModal').modal()
            })
        },
        data() {
            return {
                projectTeamFormTitle: 'Ajout Membre Projet',
                projectTeamMember: {},
                participantId: '',
                projectTeamMemberForm: new Form(new ProjectTeamMember({})),
                projectTeamMemberId: null,
                editing: false,
                loading: false
            }
        },
        methods: {
            createProjectTeamMember(participantId) {
                this.loading = true
                this.projectTeamMemberForm
                    .post('/participantmembers')
                    .then(projectteammember => {
                        this.loading = false
                        console.log("createProjectTeamMember: ", projectteammember)
                        ProjectTeamBus.$emit('projectteammember_created', {projectteammember, participantId})
                        $('#projectteamformModal').modal('hide')
                    }).catch(error => {
                    this.loading = false
                });
            },
        },
        computed: {
            isValidForm() {
                return !this.loading
            }
        }
    }
</script>

<style scoped>

</style>
