<template>
    <div class="row">

        <div class="col-12 col-lg-5 align-self-center text-center">
            <h3 class="heading-alt fw-300">Formulaire de candidature</h3><br>
            <p>Veuillez remplir le formulaire ci-joint et y attacher le dossier de votre startup sous le format de deux fichiers « Compressés »  ne dépassant pas chacun 70 Mo.
            </p>
            <ul class="text-sm-left">
                <li>Premier : Administrative , contenant les pièces administratives de votre startup.</li>
                <li>Second  : Dossier de candidature , contenant une présentation de votre startup , Etude de marché , business plan … et tout autre document que vous estimiez capable d’enrechir votre candidature .</li>
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
                    <textarea class="form-control" name="complementinfos" placeholder="Complément information" rows="3" v-model="participantForm.complementinfos"></textarea>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('complementinfos')" v-text="participantForm.errors.get('complementinfos')"></small></p>
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
            this.complementinfos = participant.complementinfos || ''
            this.reglementvalide = participant.reglementvalide || ''
        }
    }

    export default {
        name: "ParticipantCreate",
        props: {
            getfileuploadmaxsize_prop: 0,
        },
        mounted() {
            this.editing = false
            this.participant = new Participant({})
            this.participantForm = new Form(this.participant)
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
                        window.noty({
                            message: 'Votre inscription a été enregistrée, merci pour votre participation !',
                            type: 'success'
                        })
                        this.resetForm();

                    }).catch(error => {
                    this.loading = false
                });
            },
            resetForm() {
                //this.participantForm.nom = ''
                //this.participantForm.nomgroupe = ''
                //this.participantForm.email = ''
                //this.participantForm.phone = ''
                //this.participantForm.fichier_administrative = ''
                //this.participantForm.fichiervideo = ''
                //this.participantForm.complementinfos = ''
                //this.participantForm.reglementvalide = ''
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
