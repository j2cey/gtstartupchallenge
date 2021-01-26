@extends('layouts.app')

@section('header')
    <header class="header header-inverse h-fullscreen pb-80" style="background-image: url({{ asset('assets/img/Business_People_Team_With_World_Map.jpg') }})" data-overlay="8">

        <div class="container text-center">

            <div class="row h-full">
                <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

                    <h1 class="display-4">
                        Concours
                        <p>« Moov Africa GT Startup Challenge »</p>
                        de Moov Africa-Gabon Telecom
                    </h1>

                    <p class="lead text-white fs-20">
                        Faites preuve d’innovation et partager le projet de votre startup sur « <span class="fw-400"><span class="mark-border">Moov Africa GT Startup Challenge</span></span> ».</p>

                    <h3 class="text text-primary">
                        Et gagnez jusqu'à 6 Million FCFA +  PC portable dernière génération en Plus de Plusieur avantages
                    </h3>

                </div>

                <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-2 scroll-down-inverse" href="#" data-scrollto="section-reglement">
                        <span></span>
                    </a>
                    <br><br>
                    <div class="col-12 align-self-end text-center">
                        <a class="btn btn-lg btn-round w-200 btn-secondary-outline mr-16" href="#" data-scrollto="section-reglement">Cliquez Ici</a>
                    </div>
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
                    <ul class="list-unstyled fs-12">
                        Moov Africa – Gabon télécom organise un challenge pour célébrer les meilleures startups dans le digital au Gabon. Le challenge se déroule sur trois phases :
                        <ul class="contacts-list-status fs-12">
                            <li>Appel à candidature : 30 startups sont présélectionnés pour la suite de la compétition.</li>
                            <li>Phase dite d’accompagnement, pendant laquelle  un panel de 10 startup sont sélectionnées parmi les startups présélectionnés pour un accompagnement approfondi dans différents thèmes : Marketing, Commercial, juridique..</li>
                            <li>Une grande finale, pendant laquelle 3 startups sont choisis par un jury qualifié à l’issue de présentation directes.</li>
                        </ul>
                    </ul>
                </div>

                <div class="col-12 col-md-4 feature-2">
                    <p class="feature-icon text-info"><i class="icon-presentation"></i></p>
                    <h6>Eligibilité</h6>
                    <ul class="list-unstyled fs-12 text-justify">
                        Les startups éligibles au programme doivent basées au Gabon  ou avoir une partie de l'activité au Gabon  avec structure juridique de droit gabonais et doivent  opérer dans les secteurs suivants :
                        <ul class="contacts-list-status">
                            <li>IOT : internet des objets</li>
                            <li>Health-Tech : solutions digitales pour la santé</li>
                            <li>Ed-Tech : solutions digitales pour l’éducation</li>
                            <li>Agri-Tech : solutions digitales pour l’agriculture</li>
                            <li>Fin-Tech : solutions digitales pour le paiement mobile</li>
                            <li>Smart city : Solutions pour les villes intelligentes</li>
                            <li>Transport : Solution digitale pour transport</li>
                        </ul>
                    </ul>
                </div>

                <div class="col-12 col-md-4 feature-2">
                    <p class="feature-icon text-info"><i class="icon-gears"></i></p>
                    <h6>Règlement</h6>
                    <p class="text fs-12 text-info">Cliquer ci-dessous pour consulter le ...
                        <br>
                        <a class="fw-600 fs-18 text-danger" href="{{ asset('uploads/pdf/Reglement_Startup_Challenge_MoovAfrica_GT_VF.pdf') }}">... Règlement du Concours <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
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
                        <span class="fs-12">Au plus 30 startups à fort potentiel et qui répondent aux critères d'éligibilité seront présélectionnées sur la base du formulaire de candidature. Des informations complémentaires et/ou entretiens peuvent être demandés lors de la phase d’évaluation des candidatures.</span>
                        <br>
                        <small class="text text-success">Etape 2:</small>
                        <span class="fs-12">
                            Les startups présélectionnées seront notés par un jury interne sur des critères objectifs détaillé dans les critère de sélection en bas. Des informations complémentaires peuvent être demandées en préparation à la présentation devant le comité de sélection. A l’issu de cette phase, 10 startup seront choisi pour  se qualifier à la phase de l’Accompagnement. La sélection des 10 startups bénéficiaires du programme se fait sur la base des critères suivants:
                            <ul class="list-group-flush fs-12">
                                <li>Qualifications et expérience de l'équipe</li>
                                <li>Réalisations</li>
                                <li>Idée et/ou modèle d'entreprise innovant et scalable</li>
                                <li>Opportunités de marché</li>
                                <li>Validation de marché</li>
                                <li>Présenter un prototype convaincant</li>
                            </ul>
                            <span class="fs-12">
                            Les 10 startups sélectionnées seront accompagnées par Moov Africa Gabon Télécom à travers:
                            </span>
                            <ul class="list-group-flush fs-12">
                                <li>
                                    Des Séances de formations pratiques assurées par des cabinets externes des responsables de Moov Africa - Gabon Télécom portant sur le Volet :
                                    <ul>
                                        <li>Juridique</li>
                                        <li>Marketing</li>
                                        <li>Digitale</li>
                                        <li>Financier</li>
                                        <li>Sécurité</li>
                                    </ul>
                                </li>
                                <li>Accompagnement personnalisé par des mentors, et experts de l’écosystème entrepreneurial au Gabon</li>
                                <li>Possibilité de participation à des événements et boot-camps nationaux et internationaux via des programmes partenaires</li>
                            </ul>
                        </span>
                        <small class="text text-success">Etape Grande Finale:</small>
                        <span class="fs-12">
                            À l'issu du programme, les 10 startups auront l'opportunité de présenter leurs projets devant un comité pour choisir 3 grands gagnants.
                        </span>
                    </p>
                </div>

                <div class="col-12 col-md-4 feature-2">
                    <p class="feature-icon text-info"><i class="icon-gift"></i></p>
                    <h6>Attribution des Lots</h6>
                    <ul class="list-unstyled fs-12">
                        Les 10 startups finalistes choisis pour participer à la grande final auront droit chacun à un packages incluant:
                        <ul class="contacts-list-status fs-12">
                            <li>Un an d’abonnement haut débit internet</li>
                            <li>1 an abonnement plateforme AL-PHORM</li>
                            <li>1 pack sécurité internet.</li>
                        </ul>
                        Les lauréats des trois (3) premiers projets classés par le jury de la compétition finale se verront attribuer un prix supplémentaire lors de la de la cérémonie de la grande finale , A savoir:
                        <br>
                        <small class="text text-warning">1er Prix :</small>
                        <span class="fs-12">Subvention de 6 Millions de FCFA + Un PC Professionnel.</span>
                        <br>
                        <small class="text text-warning">2e Prix :</small>
                        <span class="fs-12">Subvention de  3 Millions de FCFA + Un PC Professionnel.</span>
                        <br>
                        <small class="text text-warning">3e Prix :</small>
                        <span class="fs-12">Subvention de  2 Millions de FCFA + Un PC Professionnel.</span>
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
