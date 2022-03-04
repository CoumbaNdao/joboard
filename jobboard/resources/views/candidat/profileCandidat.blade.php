<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Webpage Title -->
    <title>Modification profil Candidat</title>
    <!-- Styles -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Favicon  -->
    <link rel="icon" href="{{asset('images/CoumbAnneFavicon.png')}}">
</head>

<body data-spy="scroll" data-target=".fixed-top">

<!-- Header -->
<header id="header" class="bodyConnexion">
    <a class="navbar-brand logo-image" href="{{route('index')}}"><img class="dimLogo" src="{{asset('images/logo.png')}}" alt="alternative"></a>
    <div class="container">
        <div class="row ">
            <div class="col-10 emplacementForminsc">
                <h6 class="text-uppercase mb-4 font-weight-bold titreInsc">Mon profil</h6>
                <form class="Inscform" method="post" action="{{route('candidat.update')}}">
                    @csrf
                    <div class="form-group row champPlacement ">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="nomCandidat" id="inputNom" disabled value="{{$candidat->nomCandidat}}" placeholder="Nom" >
                        </div>
                    </div>
                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="prenomCandidat" id="inputPrenom" value="{{$candidat->prenomCandidat}}" disabled placeholder="Prenom" >
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="email" class="form-control" name="emailCandidat" id="inputEmail" value="{{$candidat->emailCandidat}}" required="required" placeholder="Email" >
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="tel" class="form-control" name="telephoneCandidat" id="example-tel-input" value="{{$candidat->telephoneCandidat}}" required="required" placeholder="Téléphone" >
                        </div>
                    </div>


                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="adresseCandidat" id="inputNom" value="{{$candidat->adresseCandidat}}" required="required" placeholder="Adresse" >
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="cpCandidat" id="inputNom" value="{{$candidat->cpCandidat}}" required="required" placeholder="Code Postal" >
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="villeCandidat" id="inputNom" value="{{$candidat->villeCandidat}}" required="required" placeholder="Ville" >
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" list="listca" name="codePostalRegion" value="{{ $candidat->region->nomRegion}}" required="required" placeholder="Région" >
                            <datalist id="listca">
                                @foreach($regions as $region)
                                    <option value="{{$region->nomRegion}}" ></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>


                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" list="listd" name="IDNiveauEtude" id="inputNom"  value="{{$candidat->niveauetude->diplomeObtenu}}" required="required" placeholder="Dernier diplôme obtenu" >
                            <datalist id="listd">
                                @foreach($niveauEtudes as $niveauEtude)
                                    <option value="{{$niveauEtude->diplomeObtenu}}" ></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>



                <!--    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="date" class="form-control" name="dateDiplomeCandidat" id="inputEmail" required="required" placeholder="Date d'obtention" >
                        </div>
                    </div>-->


                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="email" class="form-control" name="loginCandidat" id="inputEmail" value="{{$candidat->loginCandidat}}" required="required" placeholder="Login " >
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="oldPassword" id="inputMotDePasse"  placeholder="Ancien mot de passe">
                        </div>
                    </div>


                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="mdpCandidat" minlength="8" maxlength="10" id="inputMotDePasse"  placeholder="Nouveau mot de passe">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="password" class="form-control" minlength="8" maxlength="10" name="validationMdp" id="inputMotDePasse"  placeholder="Confirmer le nouveau mot de passe">
                        </div>
                    </div>

                    <input class="inscpBouton" type="submit" value="Modifier">
                </form>
                <br>
                <br>
            </div>
        </div>
    </div>
</header>

</body>


<!-- Scripts -->
<script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>

