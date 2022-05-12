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
                        Moov Africa – Gabon télécom organise un challenge pour célébrer les meilleures startups dans le digital au Gabon. Le challenge se déroule sur quatre phases :
                        <ul class="contacts-list-status fs-14">
                            <li>Appel à candidature : 30 startups sont présélectionnées pour la suite de la compétition.</li>
                            <li>Phase dite d’accompagnement, pendant laquelle un panel de 10 startup sont sélectionnées pour un accompagnement approfondi.</li>
                            <li>Une grande finale nationale, pendant laquelle 3 startups sont choisies par un jury qualifié à l’issue de présentations directes.</li>
                            <li>Une grande finale Groupe.</li>
                        </ul>
                    </ul>
                </div>

                <div class="col-12 col-md-4 feature-2">
                    <p class="feature-icon text-info"><i class="icon-presentation"></i></p>
                    <h6>Eligibilité</h6>
                    <ul class="list-unstyled fs-14 text-justify">
                        Les startups éligibles au programme doivent être basées au Gabon ou avoir une partie de l'activité au Gabon avec structure juridique de droit gabonais et devant opérer dans les secteurs suivants :
                        <ul class="contacts-list-status">
                            <li>IOT : internet des objets</li>
                            <li>Health-Tech : solutions digitales pour la santé</li>
                            <li>Ed-Tech : solutions digitales pour l’éducation</li>
                            <li>Agri-Tech : solutions digitales pour l’agriculture</li>
                            <li>Fin-Tech : solutions digitales pour le paiement mobile</li>
                            <li>Smart city : Solutions pour les villes intelligentes</li>
                        </ul>
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
                        <small class="text text-success">Etape 1:</small>
                        <span class="fs-14">Au plus 30 startups à fort potentiel répondant aux critères d'éligibilité seront présélectionnées sur la base du formulaire de candidature. Des informations complémentaires et/ou entretiens peuvent être demandés lors de la phase d’évaluation des candidatures.</span>
                        <br>
                        <small class="fw-600 fs-14 text-danger"> <i class="fa fa-caret-right"></i> Période du 08/03/21 au 30/04/21</small>
                        <br>
                        <small class="text text-success">Etape 2:</small>
                        <span class="fs-14">
                            Les startups présélectionnées seront notées par un jury interne sur critères de sélection objectifs précisés dans le règlement intérieur (ci-joint). Des informations complémentaires peuvent être demandées en préparation à la présentation devant le comité de sélection. A l’issue de cette phase, 10 startups seront choisies pour se qualifier à la phase de l’Accompagnement.
                            <br>
                            Les 10 startups sélectionnées seront accompagnées par Moov Africa Gabon Télécom à travers plusieurs actions et formations dans différents domaines ( plus de détail dans le règlement intérieur )
                        </span>
                        <small class="fw-600 fs-14 text-danger"> <i class="fa fa-caret-right"></i> Période du 01/05/21 au 30/06/21</small>
                        <br>
                        <small class="text text-success">Etape Grande Finale:</small>
                        <span class="fs-14">
                            À l'issue du programme, les 10 startups auront l'opportunité de présenter leurs projets devant un comité qui élira 3 grands gagnants.

                            <small class="fw-600 fs-14 text-danger"> La date sera communiquée ultérieurement </small>
                            .
                        </span>
                    </p>
                </div>

                <div class="col-12 col-md-4 feature-2">
                    <p class="feature-icon text-info"><i class="icon-gift"></i></p>
                    <h6>Attribution des Lots</h6>
                    <ul class="list-unstyled fs-14">
                        Les 10 startups finalistes auront droit chacun à un package incluant( Enveloppe remise par Moov Africa –GT) :
                        <ul class="contacts-list-status fs-14">
                            <li>Un an d’abonnement haut débit internet</li>
                            <li>1 an abonnement plateforme AL-PHORM</li>
                            <li>1 pack sécurité internet.</li>
                        </ul>
                        Les lauréats des trois (3) premiers projets classés par le jury de la compétition finale se verront attribuer un prix supplémentaire lors de la cérémonie de la grande finale , à savoir:
                        <br>
                        <small class="text text-warning">1er Prix :</small>
                        <span class="fs-14">Subvention de 10 Millions de FCFA (Remis par Moov Africa-Gabon Telecom).</span>
                        <br>
                        <small class="text text-warning">2e Prix :</small>
                        <span class="fs-14">Subvention de 6 Millions de FCFA (Remis par Huawei).</span>
                        <br>
                        <small class="text text-warning">3e Prix :</small>
                        <span class="fs-14">Subvention de 4 Millions de FCFA (Remis par BS Gabon).</span>
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
