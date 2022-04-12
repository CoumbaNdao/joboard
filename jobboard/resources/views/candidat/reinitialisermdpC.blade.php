<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Webpage Title -->
    <title>Réinitialisation de mot de passe </title>
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
    <a class="navbar-brand logo-image" href="{{route('index')}}"><img class="dimLogo" src="{{asset('images/logo.png')}}"
                                                                      alt="alternative"></a>
    <div class="container">
        <div class="row">
            <div class="col-5 emplacementForm">
                <h6 class="text-uppercase mb-4 font-weight-bold titreCo">Réinitialisation de mot de passe </h6>
                @if(isset($mail))
                <form method="post" action="{{route('candidat.recoverPassword')}}">
                    @csrf
                    <div class="form-group row champPlacement">
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputMotDePasse" required="required"
                                   name="loginCandidat" value="{{$mail}}" placeholder="Login">
                        </div>
                    </div>
                    <div class="form-group row champPlacement">
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputMotDePasse" minlength="8" maxlength="20" required="required"
                                   name="mdpCandidat"  placeholder="Choisir un nouveau mot de passe">
                        </div>
                    </div>
                    <div class="form-group row champPlacement">
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputMotDePasse" required="required"
                                   name="validationMdp" placeholder="Confirmer le mot de passe">
                        </div>
                    </div>
                    <input type="submit" value="Envoyer"> <!---REDIRIGER VERS LA PAGE DE CONNEXION-->
                </form>
                @else
                    <form method="post" action="{{route('ressetPassWordC')}}">
                        @csrf
                        <div class="form-group row champPlacement">
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputMotDePasse" required="required"
                                       name="loginCandidat" placeholder="Login">
                            </div>
                        </div>
                        <input type="submit" value="Envoyer"> <!---REDIRIGER VERS LA PAGE DE CONNEXION-->
                    </form>
                @endif
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
