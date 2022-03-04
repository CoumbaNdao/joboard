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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!-- Favicon  -->
    <link rel="icon" href="{{asset('images/CoumbAnneFavicon.png')}}">
</head>

<body id="header" class="bodyOffre" data-spy="scroll" data-target=".fixed-top">

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

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{route('entreprise.edit')}}">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{route('entreprise.deconnexion')}}">Déconnexion</a>
                </li>


            </ul>
        </div>
    </div>
</nav>
<!-- Header -->
<header id="header" class="header2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-container">
                    <p class="headerPresentation">JobAge par CoumbAnne</p>
                    <h1 class="titlePresentation">Bienvenue dans votre espace!</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Offres -->
<div class="container">
    <div class="row">
        <div class="col-3 col-sm-3">
            <div class="card col-sm-12 colorCard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="{{asset($entreprise->logoEntreprise)}}"
                                 style="height: 30px;"/>


                        </div>
                        <div class="col-sm-12">
                            <h5 class="card-title">{{$entreprise->raisonSociale}}</h5>
                            <p>{{$entreprise->descEntreprise}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-9 col-sm-9">
            <div class="card col-sm-12 offremarget">
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title">Gestion des offres</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form method="post" class="form-horizontal mb-5" action="{{route('offre.create')}}">
                        @csrf
                        <table class="table table-striped" style="border:1px solid lightgray;">
                            <tr>
                                <th>Intitulé</th>
                                <th>Valeur</th>
                            </tr>
                            <tr>
                                <td><label for="titreOffre">Titre de l'offre</label></td>
                                <td><input type="text" name="titreOffre" class="form-control" id="titreOffre" required>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="descOffre"> Description de l'offre</label></td>
                                <td><input type="text" name="descOffre" class="form-control" id="descOffre" required>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="remuneration"> Remuneration</label></td>
                                <td><input type="text" name="remuneration" class="form-control" id="remuneration"
                                           required></td>
                            </tr>
                            <tr>
                                <td><label for="dateDebutContrat"> Date de début du contrat</label></td>
                                <td><input id="dateDebutContrat" class="form-control" type="date" required
                                           name="dateDebutContrat"></td>
                            </tr>
                            <tr>
                                <td><label for="dureeContrat"> Duree du contrat</label></td>
                                <td><input class="form-control" id="dureeContrat" type="text"
                                           name="dureeContrat"></td>
                            </tr>


                            <tr>
                                <td><label for="IDCompetence">compétence requise</label></td>
                                <td>
                                    <select id="IDCompetence" name="IDCompetence" class="form-control">
                                        @foreach($competences as $competence)
                                            <option
                                                value="{{$competence->IDCompetence}}">{{$competence->libelleCompetence}} </option>
                                        @endforeach
                                    </select>


                                </td>
                            </tr>
                            <tr>
                                <td><label for="statutOffre">statut de l'offre</label></td>
                                <td>
                                    <select id="statutOffre" name="statutOffre" class="form-control">
                                        <option value="expiree">Expirée</option>
                                        <option value="publiee">Publiée</option>
                                        <option value="en attente de publication">En attente de publication</option>
                                    </select>


                                </td>
                            </tr>


                            <tr>
                                <td><label for="IDNiveauEtude">niveau d'étude</label></td>
                                <td>
                                    <select id="IDNiveauEtude" name="IDNiveauEtude" class="form-control">
                                        @foreach($niveauetudes as $niveauetude)
                                            <option
                                                value="{{$niveauetude->IDNiveauEtude}}">{{$niveauetude->libelleNiveauEtude}} </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="IDTypeOffre">type d'offre</label></td>
                                <td>
                                    <select id="IDTypeOffre" name="IDTypeOffre" class="form-control">
                                        @foreach($typeOffres as $typeOffre)
                                            <option
                                                value="{{$typeOffre->IDTypeOffre}}">{{$typeOffre->libelleTypeOffre}} </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>


                            <tr>
                                <td><input type="reset" class="btn btn-danger"></td>
                                <td><input type="submit" class="btn btn-primary" value="Publier"></td>
                            </tr>


                        </table>
                    </form>
                </div>

                <div class="col-sm-12 mb-5">
                    <form method="post">
                        Recherche d'offre: <input type="text" name="mot">
                        <input type="submit" name="Rechercher" value="Rechercher">
                    </form>
                </div>

                @foreach($entreprise->offres as $offre)
                    <div class="col-sm-6 offremarge">
                        <div class="card colorCard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="{{asset($offre->entreprise->logoEntreprise)}}"
                                             style="height: 30px;"/>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5 class="card-title"></h5>
                                    </div>
                                </div>
                                <form method="post" action="{{route('offre.update', [$offre->IDOffre])}}">
                                    @csrf
                                    <table>
                                        <tr>
                                            <td><label for="titreOffre2">Titre de l'offre</label></td>
                                            <td><input name="titreOffre" type="text" value="{{$offre->titreOffre}}"
                                                       id="titreOffre2" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="descOffre2">Description de l'offre</label></td>
                                            <td><input type="text" name="descOffre" value="{{$offre->descOffre}}"
                                                       id="descOffre2" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="datePubOffre2">Date de publication de l'offre</label></td>
                                            <td><input type="date" name="datePubOffre" value="{{$offre->datePubOffre}}"
                                                       id="datePubOffre2" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="remuneration2"> Remuneration</label></td>
                                            <td><input type="text" name="remuneration" value="{{$offre->remuneration}}"
                                                       id="remuneration2" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="dateDebutContrat2">Date de début du contrat</label></td>
                                            <td><input type="date" name="dateDebutContrat"
                                                       value="{{$offre->dateDebutContrat}}" id="statutOffre"
                                                       class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="dureeContrat2"> Duree du contrat</label></td>
                                            <td><input type="text" name="dureeContrat" value="{{$offre->dureeContrat}}"
                                                       id="dureeContrat2" class="form-control">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label for="statutOffre2">statut de l'offre</label></td>
                                            <td>
                                                <select id="statutOffre2" required name="statutOffre"
                                                        class="form-control">
                                                    <option value="expiree"
                                                            @if ($offre->statutOffre === "expiree" ) selected @endif>
                                                        Expirée
                                                    </option>
                                                    <option value="publiee"
                                                            @if ($offre->statutOffre === "publiee" ) selected @endif>
                                                        Publiée
                                                    </option>
                                                    <option value="en attente de publication"
                                                            @if ($offre->statutOffre === "en attente de publication" ) selected @endif>
                                                        En attente de publication
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Compétences requise</td>
                                            <td>

                                                @foreach($offre->requerirs as $competence)
                                                    {{$competence->competences->libelleCompetence}}
                                                @endforeach
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label for="IDTypeOffre2">type d'offre</label></td>
                                            <td><input type="text" name="libelleTypeOffre"
                                                       value="{{$offre->type_offre->libelleTypeOffre}}"
                                                       id="typeOffre2" class="form-control">

                                            </td>
                                        </tr>
                                    </table>

                                    <p class="card-text"></p>
                                    <button class="btn btn-primary" type="submit">Modifier</button>

                                    <a href="{{route('offre.delete', [$offre->IDOffre])}}" class="btn btn-danger">Supprimer</a>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="col-12 col-sm-12">
            <div class="card col-sm-12 offremarget">
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title">Gestion des Candidature</h5>
                    </div>
                </div>
            </div>
            <div class="row">


                <table class="table table-striped table-primary">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Offre</th>
                        <th>Date de candidature</th>
                        <th>Action</th>
                    </tr>
                    @foreach($candidatures as $candidature)
                        <tr>
                            <td>{{$candidature->nomCandidat}}</td>
                            <td>{{$candidature->prenomCandidat}}</td>
                            <td>{{$candidature->titreOffre}}</td>
                            <td>{{$candidature->date}}</td>


                            <td>
                                @if($candidature === 2)
                                    <a class="btn btn-danger"
                                       href="{{route('offre.valider', [$candidature->IDCandidat, 'offre' => $candidature->IDOffre, 'etat'=>1])}}">Refuser</a>
                                    <a class="btn btn-success"
                                       href="{{route('offre.valider', [$candidature->IDCandidat, 'offre' => $candidature->IDOffre, 'etat' =>2])}}">Recruter</a>
                                @elseIF($candidature === 3)
                                    <p class="text-success">
                                        ACCEPTÉ
                                    </p>
                                @else
                                    <p class="text-danger">
                                        REFUSÉ
                                    </p>
                                @endif
                            </td>
                        </tr>
                    @endforeach


                </table>


            </div>
        </div>
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
                            Une platforme de recherche d'emploi et de stage pour
                            les grands et les petits.
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
                        <a class="btn btn-outline-light btn-floating m-1"
                           class="text-white"
                           role="button"
                           href="https://www.facebook.com/"
                           target="_blank"><i class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a
                            class="btn btn-outline-light btn-floating m-1"
                            class="text-white"
                            role="button"
                            href="https://www.twitter.com/"
                            target="_blank"><i class="fab fa-twitter"></i></a>

                        <!-- Linkedin -->
                        <a
                            class="btn btn-outline-light btn-floating m-1"
                            class="text-white"
                            role="button"
                            href="https://www.linkedin.com/"
                            target="_blank"><i class="fab fa-linkedin-in"></i></a>

                        <!-- Instagram -->
                        <a
                            class="btn btn-outline-light btn-floating m-1"
                            class="text-white"
                            role="button"
                            href="https://www.instagram.com/"
                            target="_blank"><i class="fab fa-instagram"></i></a>
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
<script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>
