@extends('layouts.app')

@section('header')
    <header class="header header-inverse h-fullscreen pb-80" style="background-image: url({{ asset('assets/img/Moov_Africa_START_UP_2022_1542x759.jpg') }});" data-overlay="4">

        <div class="container text-center">

            <div class="row">
                <div class="col-6">
                    <h1 class="display-4">
                        Concours
                        <p>« Moov Africa GT Startup Challenge »</p>
                        de Moov Africa-Gabon Telecom
                    </h1>

                    <p class="lead text-white fs-20">
                        Faites preuve d’innovation et partagez le projet de votre startup sur « <span class="fw-400"><span class="mark-border">Moov Africa GT Startup Challenge</span></span> ».</p>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <a class="scroll-down-2 scroll-down-inverse" href="#" data-scrollto="section-reglement">
                        <span></span>
                    </a>
                    <br><br>
                    <div class="col-12 align-self-end text-center">
                        <a class="btn btn-lg btn-round w-200 btn-secondary-outline mr-16" href="#" data-scrollto="section-reglement">Cliquez Ici</a>
                    </div>
                </div>
            </div>

            <div class="row h-full">
                <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

                </div>

                <div class="col-12 align-self-end text-center">

                </div>

            </div>

        </div>
    </header>
@stop

@section('content')

    <section class="section section-inverse pb-0 overflow-hidden" id="section-reglement" style="background-color: #50748e">
        <div class="container">

            <header class="section-header">
                <h2>Détails sur le concours</h2>
                <p></p>
            </header>

            <div class="row gap-y">

                <div class="col-12 col-md-4 feature-2">
                    <p class="feature-icon text-info"><i class="icon-scope"></i></p>
                    <h6>Principe</h6>
                    <ul class="list-unstyled fs-14">
                        Moov Africa – Gabon télécom organise un challenge pour célébrer les meilleures startups dans le digital au Gabon. Le concours se déroule en quatre phases :
                        <ul class="contacts-list-status fs-12">
                            <li>Phase 1: « Appel à candidature » Du 10 au 30 Mai 2022.</li>
                            <li>Phase 2: « Accompagnement » <span class="text text-bold">la date sera communiquée ultérieurement</span>.</li>
                            <li>Phase 3: « Grande Finale Nationale » <span class="text text-bold">la date sera communiquée ultérieurement</span>.</li>
                            <li>Phase 4: « Grande Finale Groupe »  la date sera communiquée ultérieurement.</li>
                        </ul>
                        <span class="contacts-list-status fs-10">
                        Toutes  les informations supplémentaires seront mises  à la disponibilité du public sur le site web du concours indiqué ci-dessous:
                        « http://startupchallenge.moov-africa.ga  »
                        </span>
                    </ul>
                </div>

                <div class="col-12 col-md-4 feature-2">
                    <p class="feature-icon text-info"><i class="icon-presentation"></i></p>
                    <h6>Critères de sélection</h6>
                    <ul class="list-unstyled fs-14 text-justify">
                        Les startups éligibles au programme doivent répondre à 2 critères :
                        <br>
                        <span class="text fs-12 text-bold">
                            1. Startup opérant dans les secteurs suivants :
                        </span>
                        <ul class="contacts-list-status fs-10">
                            <li>IOT: internet des objets</li>
                            <li>Heath-Tech: solutions digitales pour la santé</li>
                            <li>Ed-Tech: solutions digitales pour l’éducation</li>
                            <li>Agri-Tech: solutions digitales pour l’agriculture</li>
                            <li>Fin-Tech: solutions digitales pour le paiement mobile</li>
                            <li>Smart city : Solutions pour les villes intelligentes…</li>
                        </ul>
                        <span class="text fs-12 text-bold">
                            2. Startup basée au Gabon ou une partie de l'activité au Gabon avec structure juridique de droit gabonais.
                        </span>
                        <br>
                        <span class="text fs-12 text-bold">
                            La sélection des 10 startups bénéficiaires du programme se fait sur la base des 6 critères suivants :
                        </span>
                        <ol class="contacts-list-status fs-10">
                            <li>Qualifications et expérience de l'équipe</li>
                            <li>Réalisations</li>
                            <li>Idée et/ou modèle d'entreprise innovant et scalable</li>
                            <li>Opportunités de marché</li>
                            <li>Validation de marché</li>
                            <li>Présenter un prototype MVP convaincant</li>
                        </ol>
                        <span class="text fs-10 text-warning">
                            Toute déclaration inexacte ou mensongère, toute fraude ou tentative de fraude entraînera la disqualification du Participant.
                            <br>L’Équipe organisatrice se réserve le droit de supprimer toute participation ne se conformant pas aux dispositions stipulées au présent Règlement.
                            <br>L’Équipe organisatrice se réserve aussi  le droit de modifier la durée du Concours si des impératifs opérationnels l’imposent, pour une durée raisonnable qui sera communiquée aux Participants.
                        </span>
                    </ul>
                </div>

                <div class="col-12 col-md-4 feature-2">
                    <p class="feature-icon text-info"><i class="icon-gears"></i></p>
                    <h6>Règlement</h6>
                    <p class="text fs-14 text-info">Cliquer ci-dessous pour consulter le ...
                        <br>
                        <a class="fw-600 fs-18 text-danger" href="{{ asset('uploads/pdf/REGLEMENT_START_UP_CHALLENGE_2EME_EDITION__Valide.pdf') }}">... Règlement du Concours <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                    </p>
                    <p>
                        <a class="btn btn-xs btn-round w-200 btn-warning mr-16" href="#" data-scrollto="section-formulaire">Inscrivez-vous</a>
                    </p>
                </div>

            </div>

            <div class="row gap-y">

                <div class="col-12 col-md-8 feature-2">
                    <p class="feature-icon text-info"><i class="icon-tools"></i></p>
                    <h6>Sélection des Gagnants</h6>
                    <p class="text text-justify">
                        <small class="text text-success">Phase 1: Appel à candidature</small>
                        <span class="fs-12">
                            L’appel à candidature sera ouvert selon le planning affiché sur le site web du programme (concours).
                            <br>La participation au programme (concours) se fait à travers le formulaire de  candidature en ligne accessible à partir du site suivant : « www.startupchallenge.moov-africa.ga »
                            <br>La sélection des participants au dit concours se fera en deux phases.
                            <br>Les startups à fort potentiel et qui répondent aux critères d'éligibilité seront présélectionnées sur la base du formulaire de candidature.
                            <br>La sélection se fera  au fil de l'eau et l'appel à candidature sera clôturé selon les dates affichées sur le site du programme (concours) : « http://startupchallenge.moov-africa.ga »
                            <br>Des informations complémentaires et/ou entretiens peuvent être demandés lors de la phase de validation des candidatures.
                            <br>Les startups inscrites seront notées par un jury interne sur des critères Objectifs détaillés dans les critères de sélection énumérés ci-dessous dans la Phase 3.
                            <br>Des informations complémentaires peuvent être demandées en préparation à la présentation devant le comité de sélection.
                            <br>10 startups seront choisies pour se qualifier à l’étape de l’Accompagnement.
                        </span>
                        <br>
                        {{--<small class="fw-600 fs-14 text-danger"> <i class="fa fa-caret-right"></i> Période du 08/03/21 au 30/04/21</small>
                        <br>--}}
                        <small class="text text-success">Phase 2: Accompagnement</small>
                        <span class="fs-12">
                            Les 10 start-up présélectionnées accèderont à une phase d’accélération et de mentoring afin d’améliorer, d’optimiser leur solution et d’atteindre un niveau de maturité nettement plus élevé de leur projet et proche d’un go to market avec des prestations abouties et opérationnelles.
Le programme d’accélération s’étalera sur 6 semaines et se déroulera dans un espace d’incubation afin d’accompagner les startups sélectionnées dans leur plan de croissance en vue de leur faciliter l’accès à un réseau de mentors, d'experts et d’investisseurs.
                        </span>
                        {{--<small class="fw-600 fs-14 text-danger"> <i class="fa fa-caret-right"></i> Période du 01/05/21 au 30/06/21</small>--}}
                        <br>
                        <small class="text text-success">Phase 3: Grande Finale Nationale</small>
                        <span class="fs-12">
                            À l'issue du programme d’accélération, les startups auront l'opportunité de présenter leurs projets devant un jury composé d’experts nationaux et internationaux dans la création et le développement des startups.
                            <br>Trois(3) startups seront sélectionnées pour bénéficier des prix Moov Africa GT Start up Challenge.

                            {{--<small class="fw-600 fs-14 text-danger"> La date sera communiquée ultérieurement </small>--}}
                        </span>
                        <br>
                        <small class="text text-success">Phase 4: Grande Finale Groupe</small>
                        <span class="fs-12">
                            Le lauréat de la finale nationale participera à une Grande  Finale Groupe, organisée au Maroc.
                        <br>Le jury qui siègera en final sera composé de représentants internes de Maroc Telecom ainsi que d’experts internationaux (Les membres du comité seront choisis en commun accord avec Maroc Telecom).
                        <br>A l’issue de cette phase, trois (3) gagnants que l’on pourra qualifier de «  Gagnants  Groupe » seront désignés.
                        <br>Les trois startups(3) gagnantes seront récompensées par des lots financiers à la charge de Maroc Telecom et bénéficieront d’un programme d’échange de deux semaines à l’étranger.
                        </span>
                    </p>
                </div>

                <div class="col-12 col-md-4 feature-2">
                    <p class="feature-icon text-info"><i class="icon-gift"></i></p>
                    <h6>Prix Accordés Competition Nationale</h6>
                    <p><span class="text fs-12">
                        La désignation des lauréats du concours sera faite par un jury lors de la «  Grande Finale Nationale »
                    </span></p>
                    <ul class="list-unstyled fs-12">
                        Les 10 startups finalistes bénéficieront d’Un an d’abonnement haut débit internet (FTTH 50 Mégas).
                        <br>Les lauréats des trois (3) premiers projets retenus par le jury de la compétition finale se verront attribuer un prix supplémentaire lors de la cérémonie de la grande finale groupe, à savoir :
                        <br>
                        <small class="text text-warning">1e Prix :</small>
                        <span class="fs-14">Subvention de 10 Millions de FCFA</span>
                        <br>
                        <small class="text text-warning">2e Prix :</small>
                        <span class="fs-14">Subvention de 6 Millions de FCFA.</span>
                        <br>
                        <small class="text text-warning">3e Prix :</small>
                        <span class="fs-14">Subvention de 4 Millions de FCFA.</span>
                    </ul>
                </div>

            </div>

        </div>
    </section>

    <section class="section" id="section-formulaire">
        <div class="container">

            <participant-create :getfileuploadmaxsize_prop="{{ $getfileuploadmaxsize }}" ></participant-create>

        </div>
    </section>

@stop
