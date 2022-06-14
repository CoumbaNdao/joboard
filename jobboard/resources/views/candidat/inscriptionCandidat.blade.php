<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Webpage Title -->
    <title>Inscription candidat</title>
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
    <a class="navbar-brand logo-image" href="{{route('index')}}"><img class="dimLogo" src="{{asset('images/logo.png')}}"
                                                                      alt="alternative"></a>
    <div class="container">
        <div class="row ">
            <div class="col-10 emplacementForminsc">
                <h6 class="text-uppercase mb-4 font-weight-bold titreInsc">Inscription</h6>
                <form class="Inscform" method="post" id="candidatInscriptionForm" style="margin-left: -5vw"
                      action="{{route('candidat.create')}} ">
                    @csrf
                    <div class="form-group row champPlacement ">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="nomCandidat" id="inputNom" required="required"
                                   placeholder="Nom">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="prenomCandidat" id="inputPrenom"
                                   required="required" placeholder="Prenom">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="email" class="form-control" name="emailCandidat" id="inputEmail"
                                   required="required" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="tel" class="form-control" name="telephoneCandidat" id="example-tel-input"
                                   required="required" placeholder="Téléphone">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="adresseCandidat" id="inputNom"
                                   required="required" placeholder="Adresse">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="cpCandidat" id="inputNom" required="required"
                                   placeholder="Code Postal">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="villeCandidat" id="inputNom"
                                   required="required" placeholder="Ville">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <select class="form-control" name="codePostalRegion" id="inputNom" required="required">
                                @foreach($regions as $region)
                                    <option value="{{$region->codePostalRegion}}">{{$region->nomRegion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" list="lister" name="IDCompetence" id="inputNom"
                                   required="required" placeholder="Compétence">
                            <datalist id="lister">
                                @foreach($competences as $competence)
                                    <option value="{{$competence->libelleCompetence}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" list="listd" name="IDNiveauEtude" id="inputNom"
                                   required="required" placeholder="Dernier diplôme obtenu">
                            <datalist id="listd">
                                @foreach($niveauEtudes as $niveauEtude)
                                    <option value="{{$niveauEtude->diplomeObtenu}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">

                            <p class="text-danger">{{$message}}</p>

                            <input type="date" class="form-control" name="dateDiplomeCandidat" id="inputEmail"
                                   required="required" placeholder="Date d'obtention">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="email" class="form-control" name="loginCandidat" id="inputEmail"
                                   placeholder="Login si différent du mail">
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <p id="text" class="text-danger"></p>
                            <input type="password"
                                   class="form-control"
                                   data-name="tet"
                                   name="mdpCandidat"
                                   minlength="8"
                                   maxlength="20"
                                   id="mdpCandidat"
                                   onkeyup="sec()"
                                   required="required"
                                   placeholder="Mot de passe">
                            <span id="msg"></span>
                        </div>
                    </div>

                    <div class="form-group row champPlacement">
                        <div class="col-sm-12">
                            <input type="password" class="form-control  minlength=8" maxlength="20" name="validationMdp"
                                   id="inputMotDePasse" required="required" placeholder="Confirmer le mot de passe">
                        </div>
                    </div>

                    <input class="inscpBouton btn btn-primary" style="margin-left: 5vw" onclick="validateMdp()" value="S'inscrire">
                </form>
                <br>
                <br>
            </div>
        </div>
    </div>
</header>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>


    function sec() {
        let mdp = document.getElementById('mdpCandidat').value;
        let msg = "";

        console.log(this);

        if (mdp.length > 20) {
            msg = msg + "<li class='text-danger'> mot de pass trop long"
        }

        if (mdp.length < 8) {
            msg = msg + "<li class='text-danger'> Doit contenir au moins 8 carracateres"
        }

        if (!mdp.match(/[0-9]/g)) {
            msg = msg + "<li class='text-danger'> mot de pass doit contenir un chiffre"
        }

        if (!mdp.match(/[a-z]/g)) {
            msg = msg + "<li class='text-danger'> mot de pass doit contenir un caractère en minuscule"
        }

        if (!mdp.match(/[A-Z]/g)) {
            msg = msg + "<li class='text-danger'> mot de pass doit contenir un caractère en Majuscule"
        }

        if (!mdp.match(/[^a-zA-z\d]/g)) {
            msg = msg + "<li class='text-danger'> mot de pass doit contenir un caractère spécial"
        }

        document.getElementById('msg').innerHTML = msg
    }

    function validateMdp() {
        let mdp = document.getElementById('mdpCandidat').value;

        if (
            mdp.match(/[0-9]/g) &&
            mdp.match(/[a-z]/g) &&
            mdp.match(/[A-Z]/g) &&
            mdp.match(/[^a-zA-z\d]/g) &&
            mdp.length <= 20 &&
            mdp.length >= 8
        ) {
            document.getElementById("candidatInscriptionForm").submit();
        } else {
            alert('Votre mot de passe doit respecter les critères suivants : ' +
                'Entre 8 et 12 caractères,' +
                ' au moins un chiffre,' +
                ' une lettre majuscule et miniscule' +
                ' et un caractère spécial' + mdp);
        }


    }

</script>


<script src="{{asset('js/jquery.min.js')}}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="{{asset('js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
<script src="{{asset('js/jquery.easing.min.js')}}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="{{asset('js/scripts.js')}}"></script> <!-- Custom scripts -->
</body>
</html>
