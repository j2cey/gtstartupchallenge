<template>
    <div class="row">

        <div class="col-12 col-lg-5 align-self-center text-center">
            <h3 class="heading-alt fw-300">Formulaire de candidature</h3><br>
            <p>Veuillez remplir le formulaire ci-joint et y attacher le dossier de votre startup sous le format de deux fichiers « Compressés »  ne dépassant pas chacun 70 Mo.
            </p>
            <ul class="text-sm-left">
                <li>Premier : Administrative , contenant les pièces administratives de votre startup.</li>
                <li>Second  : Dossier de candidature, contenant une présentation de votre startup, Etude de marché , business plan … et tout autre document que vous estimeriez capable d’enrichir votre candidature .</li>
            </ul>
            <br>
            <form class="form-horizontal" @submit.prevent @keydown="participantForm.errors.clear()">

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3"><i class="ti-user"></i></span>
                        <input type="text" name="nom" class="form-control" placeholder="Nom" aria-describedby="basic-addon3" v-model="participantForm.nom">
                    </div>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('nom')" v-text="participantForm.errors.get('nom')"></small></p>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="email" class="form-control" placeholder="Email address" aria-describedby="basic-addon4" v-model="participantForm.email">
                        <span class="input-group-addon" id="basic-addon4"><i class="ti-email"></i></span>
                    </div>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('email')" v-text="participantForm.errors.get('email')"></small></p>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="phone" placeholder="Numéro Téléphone" v-model="participantForm.phone">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('phone')" v-text="participantForm.errors.get('phone')"></small></p>
                </div>

                <div class="form-group input-group file-group">
                    <input type="text" class="form-control file-value" :placeholder="fichierAdministrativePlaceholder" readonly>
                    <input type="file" name="fichier_administrative" id="fichier_administrative" ref="fichier_administrative" @change="handleFichierAdministrativeUpload" multiple>
                    <span class="input-group-btn">
                        <button class="btn btn-white file-browser" type="button"><i class="fa fa-upload"></i></button>
                    </span>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('fichier_administrative')" v-text="participantForm.errors.get('fichier_administrative')"></small></p>
                </div>

                <div class="form-group input-group file-group">
                    <input type="text" class="form-control file-value" :placeholder="fichierDossierCandidaturePlaceholder" readonly>
                    <input type="file" name="fichier_dossier_candidature" id="fichier_dossier_candidature" ref="fichier_dossier_candidature" @change="handleFichierDossierCandidatureUpload" multiple>
                    <span class="input-group-btn">
                        <button class="btn btn-white file-browser" type="button"><i class="fa fa-upload"></i></button>
                    </span>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('fichier_dossier_candidature')" v-text="participantForm.errors.get('fichier_dossier_candidature')"></small></p>
                </div>

                <div class="form-group">
                    <label class="custom-control custom-checkbox">Prière de répondre aux Questionaire ci-dessous:</label>
                </div>

                <div class="form-group">
                    <label style="text-align:left; float:left;"><small class="text-sm text-info">Quel est le nom de votre  projet</small></label>
                    <input class="form-control form-control-sm" type="text" name="project_name" placeholder="" v-model="participantForm.project_name">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('project_name')" v-text="participantForm.errors.get('project_name')"></small></p>
                </div>

                <div class="form-group">
                    <label style="text-align:left; float:left;"><small class="text-sm text-info">Quel est le problème que vous souhaitez resoudre?</small></label>
                    <input class="form-control form-control-sm" type="text" name="project_problem" placeholder="" v-model="participantForm.project_problem">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('project_problem')" v-text="participantForm.errors.get('project_problem')"></small></p>
                </div>

                <div class="form-group">
                    <label style="text-align:left; float:left;"><small class="text-sm text-info">Avez-vous des chiffres ou tout autre document permettant d'évaluer la réalité du problème</small></label>
                    <input class="form-control form-control-sm" type="text" name="project_problem_eval" placeholder="" v-model="participantForm.project_problem_eval">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('project_problem_eval')" v-text="participantForm.errors.get('project_problem_eval')"></small></p>
                </div>

                <div class="form-group">
                    <label style="text-align:left; float:left;"><small class="text-sm text-info">Comment le problème est-il résolu actuellement?</small></label>
                    <input class="form-control form-control-sm" type="text" name="project_problem_current_solve" placeholder="" v-model="participantForm.project_problem_current_solve">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('project_problem_current_solve')" v-text="participantForm.errors.get('project_problem_current_solve')"></small></p>
                </div>

                <div class="form-group">
                    <label style="text-align:left; float:left;"><small class="text-sm text-info">Quelle est la solution que vous proposez? (description du projet)</small></label>
                    <textarea class="form-control form-control-sm" type="text" name="project_problem_solution" placeholder="" rows="3" v-model="participantForm.project_problem_solution"></textarea>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('project_problem_solution')" v-text="participantForm.errors.get('project_problem_solution')"></small></p>
                </div>

                <div class="form-group">
                    <label style="text-align:left; float:left;"><small class="text-sm text-info">En quoi est-elle innovante?</small></label>
                    <input class="form-control form-control-sm" type="text" name="project_problem_solution_innovative" placeholder="" v-model="participantForm.project_problem_solution_innovative">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('project_problem_solution_innovative')" v-text="participantForm.errors.get('project_problem_solution_innovative')"></small></p>
                </div>

                <div class="form-group">
                    <label style="text-align:left; float:left;"><small class="text-sm text-info">Avez-vous un lien pour tester votre solution? Ou une solution similaire?</small></label>
                    <input class="form-control form-control-sm" type="text" name="project_problem_solution_link" placeholder="" v-model="participantForm.project_problem_solution_link">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('project_problem_solution_link')" v-text="participantForm.errors.get('project_problem_solution_link')"></small></p>
                </div>

                <div class="form-group">
                    <label style="text-align:left; float:left;"><small class="text-sm text-info">Quel est le niveau de développement de votre solution (estimez en %)</small></label>
                    <input class="form-control form-control-sm" type="text" name="project_problem_solution_level" placeholder="" v-model="participantForm.project_problem_solution_level">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('project_problem_solution_level')" v-text="participantForm.errors.get('project_problem_solution_level')"></small></p>
                </div>

                <div class="form-group">
                    <label style="text-align:left; float:left;"><small class="text-sm text-info">Quel est votre cible? (qui payera pour votre solution)</small></label>
                    <input class="form-control form-control-sm" type="text" name="project_payment" placeholder="" v-model="participantForm.project_payment">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('project_payment')" v-text="participantForm.errors.get('project_payment')"></small></p>
                </div>

                <div class="form-group">
                    <label style="text-align:left; float:left;"><small class="text-sm text-info">Comment gagnerez vous de l'argent (décrivez toutes les sources de revenus généré par votre projet)</small></label>
                    <input class="form-control form-control-sm" type="text" name="project_money_source" placeholder="" v-model="participantForm.project_money_source">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('project_money_source')" v-text="participantForm.errors.get('project_money_source')"></small></p>
                </div>

                <div class="form-group">
                    <label style="text-align:left; float:left;"><small class="text-sm text-info">A combien estimez-vous le coût de mise en oeuvre de votre projet?</small></label>
                    <input class="form-control form-control-sm" type="text" name="project_cost" placeholder="" v-model="participantForm.project_cost">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('project_cost')" v-text="participantForm.errors.get('project_cost')"></small></p>
                </div>

                <div class="form-group">
                    <label style="text-align:left; float:left;"><small class="text-sm text-info">Pourquoi êtes-vous le mieux placer pour développer cette solution?</small></label>
                    <input class="form-control form-control-sm" type="text" name="project_team_value" placeholder="" v-model="participantForm.project_team_value">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('project_team_value')" v-text="participantForm.errors.get('project_team_value')"></small></p>
                </div>

                <div class="form-group">
                    <label style="text-align:left; float:left;"><small class="text-sm text-info">Présentation des membres de l'équipe</small></label>
                    <project-team :projectTeam_prop="[]"></project-team>
                    <input class="form-control form-control-sm" type="hidden" name="project_team" placeholder="" v-model="participantForm.project_team" readonly>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('project_team')" v-text="participantForm.errors.get('project_team')"></small></p>
                </div>

                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="reglementvalide" class="custom-control-input" v-model="participantForm.reglementvalide">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Je reconnais avoir pris connaissance du règlement du Concours <strong>Moov Africa GT Startup Challenge</strong> et m’engage, sans réserve à en respecter les dispositions du fait de mon inscription.</span>
                    </label>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('reglementvalide')" v-text="participantForm.errors.get('reglementvalide')"></small></p>
                </div>

                <button class="btn btn-primary btn-block" type="button" @click="createParticipant()" :disabled="!isValidCreateForm">Valider</button>
            </form>
        </div>


        <div class="col-12 offset-lg-1 col-lg-6 p-90 hidden-md-down">
            <img src="assets/img/Logo_Moov_Africa_Fond_Blanc.png" alt="..." data-aos="fade-up">
        </div>

    </div>
</template>

<script>
    class Participant {
        constructor(participant) {
            this.nom = participant.nom || ''
            this.nomgroupe = participant.nomgroupe || ''
            this.email = participant.email || ''
            this.phone = participant.phone || ''
            this.fichier_administrative = participant.fichier_administrative || ''
            this.fichier_dossier_candidature = participant.fichier_dossier_candidature || ''

            this.project_name = participant.project_name || ''
            this.project_problem = participant.project_problem || ''
            this.project_problem_eval = participant.project_problem_eval || ''
            this.project_problem_current_solve = participant.project_problem_current_solve || ''
            this.project_problem_solution = participant.project_problem_solution || ''
            this.project_problem_solution_innovative = participant.project_problem_solution_innovative || ''
            this.project_problem_solution_link = participant.project_problem_solution_link || ''
            this.project_problem_solution_level = participant.project_problem_solution_level || ''
            this.project_payment = participant.project_payment || ''
            this.project_money_source = participant.project_money_source || ''
            this.project_cost = participant.project_cost || ''
            this.project_team_value = participant.project_team_value || ''
            this.project_team = participant.project_team || ''

            this.reglementvalide = participant.reglementvalide || ''
        }
    }
    import ProjectTeamBus from './projectTeamBus'
    export default {
        name: "ParticipantCreate",
        props: {
            getfileuploadmaxsize_prop: 0,
        },
        components: {
            projectTeam: () => import('./ProjectTeam')
        },
        mounted() {
            this.editing = false
            this.participant = new Participant({})
            this.participantForm = new Form(this.participant)

            ProjectTeamBus.$on('projectteam_edited', (projectteam_data) => {
                this.participantForm.project_team = JSON.stringify(projectteam_data)
            })
        },
        data() {
            return {
                participant: {},
                participantForm: new Form(new Participant({})),
                participantId: null,
                editing: false,
                loading: false,
                errors: [],
                selectedVideoFile : null,
                selectedVideoFileName : "Selectionnez votre fichier identité...",

                selectedFichierAdministrative : null,
                fichierAdministrativePlaceholder : "Selectionnez le Premier Fichier...(" + this.getfileuploadmaxsize_prop + " Mo max)",

                fichierDossierCandidaturePlaceholder : "Selectionnez le Second Fichier...(" + this.getfileuploadmaxsize_prop + " Mo max)",
                selectedFichierDossierCandidature : null,
            }
        },
        methods: {
            handleFichierAdministrativeUpload(event) {
                this.selectedFichierAdministrative = event.target.files[0];
                //this.selectedIdentiteFileName = (typeof this.selectedIdentiteFile !== 'undefined') ? this.selectedIdentiteFile.name : 'Selectionnez votre fichier identité...';
            },
            handleFichierDossierCandidatureUpload(event) {
                this.selectedFichierDossierCandidature = event.target.files[0];
                //this.selectedVideoFileName = (typeof this.selectedVideoFile !== 'undefined') ? this.selectedVideoFile.name : 'Selectionnez votre fichier video...';
            },
            createParticipant() {
                this.loading = true

                const fd = new FormData();
                fd.append('fichier_administrative', this.selectedFichierAdministrative);
                fd.append('fichier_dossier_candidature', this.selectedFichierDossierCandidature);

                this.participantForm
                    .post('/participants', fd)
                    .then(newparticipant => {
                        this.loading = false
                        this.$swal({
                            html: '<small>Votre inscription a été enregistrée, merci pour votre participation !</small>',
                            icon: 'success',
                            timer: 5000
                        }).then(() => {
                            this.resetForm();
                        })

                    }).catch(error => {
                    this.loading = false
                });
            },
            resetForm() {
                this.participantForm.reset();
                this.$refs.fichier_administrative.value = '';
                this.$refs.fichiervideo.value = '';
            }
        },
        computed: {
            isValidCreateForm() {
                return !this.loading
            }
        }
    }
</script>

<style scoped>

</style>
