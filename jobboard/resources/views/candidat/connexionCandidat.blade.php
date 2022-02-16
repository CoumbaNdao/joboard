<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Webpage Title -->
    <title>Connexion</title>
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
<!-- Image Logo -->
<header id="header" class="bodyConnexion">
    <a class="navbar-brand logo-image" href="index.html"><img class="dimLogo" src="images/logo.png" alt="alternative"></a>
    <div class="container">
        <div class="row">
            <div class="col-5 emplacementForm">
                <h6 class="text-uppercase mb-4 font-weight-bold titreCo">Authentification</h6>
                <form method="post" action="{{route('candidat.login')}}">
                    @csrf
                    <div class="form-group row champPlacement">
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" name="loginCandidat" required="required" placeholder="Login" >
                        </div>
                    </div>
                    <div class="form-group row champPlacement">
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputMotDePasse" name="mdpCandidat" required="required" placeholder="Mot de passe">
                        </div>
                    </div>
                    <a href="offre.html"><input type="submit" value="Se connecter"></a>
                </form>
                <br>
                <p><a class=" font-weight-bold lienInscription " href="motdepasse.html">Mot de passe oublié ?</a></p>
                <p>Pas encore de compte ? <a class=" font-weight-bold lienInscription " href="{{route('candidat.inscription')}}">Inscription</a></p>
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
