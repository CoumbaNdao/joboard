<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Webpage Title -->
    <title>Inscription</title>
    <!-- Styles -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!-- Favicon  -->
    <link rel="icon" href="{{asset('images/CoumbAnneFavicon.png')}}">
</head>

<body data-spy="scroll" data-target=".fixed-top">

<!-- Header -->
<header id="header" class="bodyConnexion">
    <a class="navbar-brand logo-image" href="{{route('index')}}"><img class="dimLogo" src="{{asset('images/logo.png')}}"
                                                                      alt="alternative"></a>
    <div class="container">
        <div class="row">
            <div class="col-10 emplacementForminsc">
                <h6 class="text-uppercase mb-4 font-weight-bold titreInsc">Inscription</h6>

                <form class="Inscform" method="post" action="{{route('entreprise.create')}}" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group row champPlacement ">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputNom" name="numeroSiret" required="required"
                                   placeholder="Numéro Siret">
                        </div>
                    </div>
                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="raisonSociale" id="inputPrenom"
                                   required="required"
                                   placeholder="Raison Sociale">
                        </div>
                    </div>
                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="email" class="form-control" name="emailEntreprise" id="inputRaisonSociale"
                                   required="required"
                                   placeholder="Adresse e-mail de contact">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="tel" class="form-control" name="telEntreprise" id="inputRaisonSociale"
                                   required="required"
                                   placeholder="Téléphone">
                        </div>
                    </div>




                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="file" class="form-control" name="logoEntreprise" id="logoEntreprise"
                                   placeholder="Logo">
                        </div>
                    </div>





                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="descEntreprise" id="descEntreprise"
                                   required="required"
                                   placeholder="Description de l'entreprise">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="adresseEntreprise" id="inputLieu"
                                   required="required"
                                   placeholder="Siège social">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="cpEntreprise" id="inputLieu"
                                   required="required"
                                   placeholder="Code Postal">
                        </div>
                    </div>


                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="villeEntreprise" id="inputLieu"
                                   required="required"
                                   placeholder="Ville">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" list="listLieu" name="codePostalRegion" class="form-control"
                                   id="inputLieu" required="required"
                                   placeholder="Région">
                            <datalist id="listLieu">
                                @foreach($regions as $region)
                                    <option value="{{$region->codePostalRegion}}">{{$region->nomRegion}}</option>
                                @endforeach
                            </datalist>

                        </div>
                    </div>
                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="url" id="inputLieu" required="required"
                                   placeholder="URL">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="inputEmail" name="loginEntreprise"
                                   placeholder="Login si différent du mail">
                        </div>
                    </div>
                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">


                                <p class="text-danger"> {{$message}}</p>

                            <input type="password" maxlength="12"  minlength="8"  class="form-control" id="inputMotDePasse" name="mdpEntreprise"
                                  required="required"
                                   placeholder="Mot de passe">

                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="password" class="form-control" maxlength="10"  minlength="8" name="validationMdp" id="inputMotDePasse" required="required"
                                   placeholder="Confirmer le mot de passe">
                        </div>
                    </div>


                    <a href="publierOffre.html"><input class="inscpBouton" type="submit" value="S'inscrire"> </a>

                </form>
                <br>
                <br>
            </div>
        </div>
    </div>
</header>


<!-- Scripts -->
<script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>
