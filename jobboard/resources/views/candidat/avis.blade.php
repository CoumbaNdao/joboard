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
        <div class="row ">
            <div class="col-10 emplacementFormAvis">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <img src="{{asset('images/iconcandidat.png')}}" class="dimImageAvis"/>
                    </div>
                    <div class="col-6">
                        <h6 class="text-uppercase mb-4 font-weight-bold titreAvis">Dites-nous ce que vous pensez !</h6>
                        <form class="Inscform" method="post" action="{{route('create')}}" enctype="multipart/form-data">
                           @csrf
                            <div class="rating">
                                <input type="radio" name="rate" value="5" id="5"><label for="5">☆</label>
                                <input type="radio" name="rate" value="4" id="4"><label for="4">☆</label>
                                <input type="radio" name="rate" value="3" id="3"><label for="3">☆</label>
                                <input type="radio" name="rate" value="2" id="2"><label for="2">☆</label>
                                <input type="radio" name="rate" value="1" id="1"><label for="1">☆</label>
                            </div>
                            <div class="form-group row champAvisPlacement ">
                                <div class="col-sm-12">
                                    <input type="text" name="nomUser" class="form-control" id="inputNom"
                                           required="required" placeholder="Nom">
                                </div>
                            </div>
                            <div class="form-group row champAvisPlacement">
                                <div class="col-sm-12">
                                    <input type="text" name="prenomUser" class="form-control" id="inputPrenom"
                                           required="required" placeholder="Prenom">
                                </div>
                            </div>

                            <!--div class="form-group  row champAvisPlacement">
                                <label class="col-sm-12">Joindre profil</label>
                                <input type="file" name="imageAvis">
                            </div-->

                            <div class="form-group row champAvisPlacement">
                                <div class="col-sm-12">
                                    <input type="file" name="imageAvis" class="form-control" id="DimChampMessage"
                                           id="inputAvis" required="required" placeholder="Profil">
                                </div>
                            </div>

                            <div class="form-group row champAvisPlacement">
                                <div class="col-sm-12">
                                    <input type="text" name="descAvis" class="form-control DimChampMessage"
                                           id="inputAvis" required="required" placeholder="Avis">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
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
