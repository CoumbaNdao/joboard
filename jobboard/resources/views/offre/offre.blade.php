<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Webpage Title -->
    <title>Offre</title>
    <!-- Styles -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Favicon  -->
    <link rel="icon" href="{{asset('images/CoumbAnneFavicon')}}.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="{{route('index')}}"><img src="{{asset('images/logo.png')}}"
                                                                          alt="alternative"></a>

        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                @if(isset($candidat))
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{route('candidat.edit')}}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{route('candidat.deconnexion')}}">Déconnexion</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{route('candidat.index')}}">Accès étudiant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{route('entreprise.index')}}">Accès entreprise</a>
                    </li>
                @endif


            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-container">
                    <p class="headerPresentation">JobAge par CoumbAnne</p>
                    <h1 class="titlePresentation">Trouve un Job à ton Age !</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Offres -->
<div class="container">
    <br>
    <div class="row">
        <div class="col-6 col-sm-3">
            <div class="card col-sm-12 colorCard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="{{asset('images/iconProfile.png')}}"
                                 style="height: 30px;"/>
                        </div>
                        <div class="col-sm-12">
                            <h5 class="card-title">@if(isset($candidat)){{$candidat->nomCandidat. ' ' . $candidat->prenomCandidat}}@else
                                    <a href="{{route('candidat.index')}}"
                                       Styles="text-decoration: none; font-weight: boldæ">Inscription</a> @endif</h5>
                            <form method="get" action="{{route('offre.search')}}">
                                <fieldset>
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" name="poste" type="text"
                                                   id="disabledFieldsetCheck"
                                                   placeholder="Rechercher un poste...">
                                            <label class="form-check-label" for="disabledFieldsetCheck">

                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="region" class="form-label">Lieu de travail</label>
                                        <select id="region" name="region" class="form-control select">

                                            <option value="{{null}}">Peu import</option>
                                            @foreach($regions as $region)
                                                <option value="{{$region->codePostalRegion}}"
                                                        @if(request('region') == $region->codePostalRegion) selected @endif>
                                                    {{$region->nomRegion}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Type de contrat</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="stage"
                                                   id="disabledFieldsetCheck" @if(request('stage')) value="on" @endif
                                            >
                                            <label class="form-check-label" for="disabledFieldsetCheck">
                                                Stage
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck"
                                                   name="alternance"
                                            >
                                            <label class="form-check-label" for="disabledFieldsetCheck">
                                                Alternance/Apprentissage
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck"
                                                   name="cdi">
                                            <label class="form-check-label" for="disabledFieldsetCheck">
                                                CDI
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck"
                                                   name="cdd">
                                            <label class="form-check-label" for="disabledFieldsetCheck">
                                                CDD
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck"
                                                   name="interim">
                                            <label class="form-check-label" for="disabledFieldsetCheck">
                                                Interim
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Rechercher</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-9">
            <div class="card col-sm-12 offremarget">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 class="card-title">Offres Disponibles</h5>
                        </div>
                        <div class="col-sm-2">
                            <h5 class="card-title"></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($offres as $offre)
                    <div class="col-sm-6 offremarge">
                        <div class="card colorCard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="{{asset($offre->entreprise->logoEntreprise)}}"
                                             style="height: 30px;"/>
                                    </div>
                                    <div class="col-sm-10">
                                        <h5 class="card-title">{{$offre->titreOffre}}</h5>
                                    </div>
                                </div>
                                <p class="card-text">{{$offre->descOffre}}</p>
                                <br>
                                <p class="card-text">Remuneration : {{$offre->remuneration}}€</p>

                                <p class="card-text">Type de contrat : {{$offre->type_offre->libelleTypeOffre}}</p>
                                <p class="card-text">Date de debut du contrat : {{$offre->dateDebutContrat}}</p>
                                <p class="card-text">Duree du contrat : {{$offre->dureeContrat}}</p>
                                <a href="{{route('candidat.postuler', [$offre->IDOffre])}}}" class="btn btn-primary">Postuler</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        @if(isset($candidatures) && count($candidatures) > 0)
            <div class="col-12 mt-5 mb-2">
                <div class="card col-sm-12 offremarget">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h5 class="card-title">Nombre de candidature: {{count($candidatures)}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach($candidatures as $candidature)
                        <div class="col-sm-6 offremarge">
                            <div class="card colorCard">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <div class="col-sm-2">
                                            <img
                                                src="{{asset($candidature->entreprise->logoEntreprise)}}"
                                                style="height: 30px;"/>
                                        </div>
                                        <div class="col-sm-10">
                                            <h5 class="card-title">{{$candidature->titreOffre}}</h5>
                                            @if($candidature->statutPostuler === 1)
                                                <p class="text-danger">REFUSÉ</p>
                                            @elseif($candidature->statutPostuler === 2)
                                                <p>En attente entreprise</p>
                                            @else
                                                <p class="text-success">ACCEPTÉ</p>
                                            @endif
                                        </div>
                                    </div>
                                    @if($candidature->statutPostuler === 2)
                                        <p class="card-text">{{$candidature->descOffre}}</p>
                                        <a href="{{route('candidat.cancel', [$candidature->IDOffre])}}}"
                                           class="btn btn-danger end">Annuler</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endif
    </div>
</div>

<!-- Footer -->
<div class="footer bg-primary">
    <div class="container">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">
                            JobAge
                        </h6>
                        <p>
                         Plateforme de recherche d'emploi !
                        </p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none"/>

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">A propos</h6>
                        <p>
                            <a class="text-white" href="ConditionUtilisation.html">Conditions d'utilisation</a>
                        </p>
                        <p>
                            <a class="text-white" href="PolitiqueConfidentialite.html">Politiques de confidentialité</a>
                        </p>
                        <p>
                            <a class="text-white" href="MentionsLegal.html">Mentions légales</a>
                        </p>
                    </div>

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none"/>

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-6 col-xl-6 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Contactez nous</h6>
                        <form>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNom" placeholder="Nom">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNomentreprise"
                                           placeholder="Nom entreprise">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="sujet" class="form-control" id="inputSujet" placeholder="Sujet">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="message" class="form-control dimchamp" id="inputMessage"
                                           placeholder="Message">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Grid column -->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->

            <hr class="my-3">

            <!-- Section: Copyright -->
            <section class="p-3 pt-0">
                <div class="row d-flex align-items-center">
                    <!-- Grid column -->
                    <div class="col-md-7 col-lg-8 text-center text-md-start">
                        <!-- Copyright -->
                        <div class="p-3">
                            © 2022 Copyright JobAge Tous droits réservés
                        </div>
                        <!-- Copyright -->
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                        <!-- Facebook -->
                        <a
                            class="btn btn-outline-light btn-floating m-1"
                            class="text-white"
                            role="button"
                            href="https://www.facebook.com/"
                            target="_blank"
                        ><i class="fab fa-facebook-f"></i
                            ></a>

                        <!-- Twitter -->
                        <a
                            class="btn btn-outline-light btn-floating m-1"
                            class="text-white"
                            role="button"
                            href="https://www.twitter.com/"
                            target="_blank"
                        ><i class="fab fa-twitter"></i
                            ></a>

                        <!-- Linkedin -->
                        <a
                            class="btn btn-outline-light btn-floating m-1"
                            class="text-white"
                            role="button"
                            href="https://www.linkedin.com/"
                            target="_blank"
                        ><i class="fab fa-linkedin-in"></i
                            ></a>

                        <!-- Instagram -->
                        <a
                            class="btn btn-outline-light btn-floating m-1"
                            class="text-white"
                            role="button"
                            href="https://www.instagram.com/"
                            target="_blank"
                        ><i class="fab fa-instagram"></i
                            ></a>
                    </div>
                    <!-- Grid column -->
                </div>
            </section>
            <!-- Section: Copyright -->
        </div>
        <!-- Grid container -->
    </div>
</div>


<!-- Scripts -->
<script src="{{asset('js/jquery.min.js')}}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="{{asset('js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
<script src="{{asset('js/jquery.easing.min.js')}}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="{{asset('js/scripts.js')}}"></script> <!-- Custom scripts -->
</body>
</html>
