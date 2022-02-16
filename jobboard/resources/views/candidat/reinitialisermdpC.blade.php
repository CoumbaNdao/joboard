<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Webpage Title -->
    <title>JobAge</title>
    <!-- Styles -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!-- Favicon  -->
    <link rel="icon" href="{{asset('images/CoumbAnneFavicon)}}.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.html"><img src="images/logo.png" alt="alternative"></a>

        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="AccesEtudiant.html">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="inscription.html">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="AccesEntreprise.html">Accès entreprise</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header id="header" class="bodyConnexion">
    <div class="container">
        <div class="row">
            <div class="col-5 emplacementForm">
                <h6 class="text-uppercase mb-4 font-weight-bold titreMdp">Réinitialiser mon mot de passe</h6>
                <form>
                    <div class="form-group row champPlacement">
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" required="required" placeholder="E-mail" >
                        </div>
                    </div>
                    <input type="submit" value="Envoyer">
                </form>
                <br>
                <p>Retour à la page d' <a class=" font-weight-bold lienInscription " href="connexionCandidat.html">Authentification</a></p>
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
