<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Webpage Title -->
    <title>Acceuil</title>
    <!-- Styles -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Favicon  -->
    <link rel="icon" href="{{asset('images/CoumbAnneFavicon.png')}}">
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
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{route('candidat.index')}}">Accès candidat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{route('entreprise.index')}}">Accès entreprise</a>
                </li>
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
                    <p class="headerPresentation">JobAge</p>
                    <h1 class="titlePresentation">Trouve un Job à ton Age !</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container recherche">
        <form method="get" action="{{route('offre.search')}}">
            <div class="row d-flex justify-content-center">

                <input type="text" id="disabledTextInput" name="poste" class="col-lg-3 form-control custo"
                       placeholder="emploi recherché">
                <button type="submit" class="custo col-lg-0 btn btn-primary rechercheBoutton"><i
                        class="fas fa-search"></i></button>


            </div>
        </form>
    </div>
</header>


<!--Company Presentation-->
<div class="basic-1 colorPresentationSection">
    <div class="container">
        <br><br>
        <div class="row align-items-end">
            <div class="col">
                <img class="presentationPicture" src="images/picturePresentation.png"/>
            </div>
            <div class="col">
                <h1 class="titlePresentation">Jobage, pourquoi ?</h1>
                <p class="textPresentation">
                    Il existe plusieurs plateformes de recrutement,
                    mais pourquoi choisir JobAge?
                    </br>
                    Entreprise, gagnez du temps en gérant vos offres ainsi que les candidatures depuis votre espace !
                    </br>
                    Candidat, fini de vous demander si votre candidature a été retenue ou non et les absences de réponses à votre candidature !
                </p>
                <br><br><br><br>
            </div>
        </div>
        <br><br>
    </div>
</div>

<!-- services -->
<div class="basic-1 colorServiceSection">
    <div class="container logocontainer">
        <br><br>
        <h1 class="titleService">Tout à notre âge</h1>
        <div class="row align-items-end">
            @foreach($partenaires as $partenaire)
                <div class="logo">
                    <a href="#">
                        <img class="logodim" src="{{asset($partenaire->logoPartenaire)}}"/>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
    <br><br>
</div>


<!--Section carousselle des avis-->
<div class="basic-1 colorPresentationSection">
    <div class="container">
        <br><br>
        <h1 class="titleService">Parlez-nous de votre expérience</h1>
        <div class="card-deck">


            <!----carousselle 1 ---->
            <div class="card">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($avis_s as $key => $avis)
                            <li data-target="#carouselExampleIndicators{{$avis->IDAvis}}" data-slide-to="{{$key}}"
                                @if($key == 0) class="active" @endif></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($avis_s as $key => $avis)
                            <div class="carousel-item @if($key == 0) active @endif">
                                <img src="{{asset($avis->imageAvis)}}" class="d-block w-100">
                                <div class="carousel-caption ">
                                    <div class="rating">


                                        @if($avis->rate === 5)

                                            <input
                                                type="radio" name="rate5"
                                                id="5"  checked="true">
                                            <label
                                                for="5">☆</label>
                                            <input
                                                type="radio" name="rate4"
                                                id="4"  checked="true">
                                            <label
                                                for="4">☆</label>
                                            <input
                                                type="radio" name="rate3" id="3" checked="true">
                                            <label
                                                for="3">☆</label>

                                            <input
                                                type="radio" name="rate2"
                                                id="2" checked="true"><label
                                                for="2">☆</label>

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>

                                        @elseif($avis->rate === 4)

                                            <input
                                                type="radio" name="rate4"
                                                id="4"  checked="true">
                                            <label
                                                for="4">☆</label>
                                            <input
                                                type="radio" name="rate3" id="3" checked="true">
                                            <label
                                                for="3">☆</label>

                                            <input
                                                type="radio" name="rate2"
                                                id="2" checked="true"><label
                                                for="2">☆</label>

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>
                                        @elseif($avis->rate === 3)


                                            <input
                                                type="radio" name="rate3" id="3" checked="true">
                                            <label
                                                for="3">☆</label>

                                            <input
                                                type="radio" name="rate2"
                                                id="2" checked="true"><label
                                                for="2">☆</label>

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>
                                        @elseif($avis->rate ===  2)



                                            <input
                                                type="radio" name="rate2"
                                                id="2" checked="true"><label
                                                for="2">☆</label>

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>
                                        @elseif($avis->rate === 1)

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>
                                        @endif


                                    </div>
                                    <h5>{{$avis->prenomUser . ' ' . $avis->nomUser}}</h5>
                                    <p>{{$avis->descAvis}}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>



            <div class="card">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($avis_s1 as $key => $avis)
                            <li data-target="#carouselExampleIndicators{{$avis->IDAvis}}" data-slide-to="{{$key}}"
                                @if($key == 0) class="active" @endif></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($avis_s1 as $key => $avis)
                            <div class="carousel-item @if($key == 0) active @endif">
                                <img src="{{asset($avis->imageAvis)}}" class="d-block w-100">
                                <div class="carousel-caption ">
                                    <div class="rating">


                                        @if($avis->rate === 5)

                                            <input
                                                type="radio" name="rate5"
                                                id="5" checked="true">
                                            <label
                                                for="5">☆</label>
                                            <input
                                                type="radio" name="rate4"
                                                id="4" checked="true">
                                            <label
                                                for="4">☆</label>
                                            <input
                                                type="radio" name="rate3" id="3" checked="true">
                                            <label
                                                for="3">☆</label>

                                            <input
                                                type="radio" name="rate2"
                                                id="2" checked="true"><label
                                                for="2">☆</label>

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>

                                        @elseif($avis->rate === 4)


                                            <input
                                                type="radio" name="rate4"
                                                id="4"  checked="true">
                                            <label
                                                for="4">☆</label>
                                            <input
                                                type="radio" name="rate3" id="3" checked="true">
                                            <label
                                                for="3">☆</label>

                                            <input
                                                type="radio" name="rate2"
                                                id="2" checked="true"><label
                                                for="2">☆</label>

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>
                                        @elseif($avis->rate === 3)


                                            <input
                                                type="radio" name="rate3" id="3" checked="true">
                                            <label
                                                for="3">☆</label>

                                            <input
                                                type="radio" name="rate2"
                                                id="2" checked="true"><label
                                                for="2">☆</label>

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>
                                        @elseif($avis->rate ===  2)

                                            <input
                                                type="radio" name="rate2"
                                                id="2" checked="true"><label
                                                for="2">☆</label>

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>
                                        @elseif($avis->rate === 1)

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>
                                        @endif


                                    </div>
                                    <h5>{{$avis->prenomUser . ' ' . $avis->nomUser}}</h5>
                                    <p>{{$avis->descAvis}}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>




            <div class="card">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($avis_s as $key => $avis)
                            <li data-target="#carouselExampleIndicators{{$avis->IDAvis}}" data-slide-to="{{$key}}"
                                @if($key == 0) class="active" @endif></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($avis_s as $key => $avis)
                            <div class="carousel-item @if($key == 0) active @endif">
                                <img src="{{asset($avis->imageAvis)}}" class="d-block w-100">
                                <div class="carousel-caption ">
                                    <div class="rating">


                                        @if($avis->rate === 5)

                                            <input
                                                type="radio" name="rate5"
                                                id="5"  checked="true">
                                            <label
                                                for="5">☆</label>
                                            <input
                                                type="radio" name="rate4"
                                                id="4"  checked="true">
                                            <label
                                                for="4">☆</label>
                                            <input
                                                type="radio" name="rate3" id="3" checked="true">
                                            <label
                                                for="3">☆</label>

                                            <input
                                                type="radio" name="rate2"
                                                id="2" checked="true"><label
                                                for="2">☆</label>

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>

                                        @elseif($avis->rate === 4)


                                            <input
                                                type="radio" name="rate4"
                                                id="4"  checked="true">
                                            <label
                                                for="4">☆</label>
                                            <input
                                                type="radio" name="rate3" id="3" checked="true">
                                            <label
                                                for="3">☆</label>

                                            <input
                                                type="radio" name="rate2"
                                                id="2" checked="true"><label
                                                for="2">☆</label>

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>
                                        @elseif($avis->rate === 3)


                                            <input
                                                type="radio" name="rate3" id="3" checked="true">
                                            <label
                                                for="3">☆</label>

                                            <input
                                                type="radio" name="rate2"
                                                id="2" checked="true"><label
                                                for="2">☆</label>

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>
                                        @elseif($avis->rate ===  2)


                                            <input
                                                type="radio" name="rate2"
                                                id="2" checked="true"><label
                                                for="2">☆</label>

                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>
                                        @elseif($avis->rate === 1)



                                            <input
                                                type="radio" name="rate1"
                                                id="1" checked="true"><label
                                                for="1">☆</label>
                                        @endif


                                    </div>
                                    <h5>{{$avis->prenomUser . ' ' . $avis->nomUser}}</h5>
                                    <p>{{$avis->descAvis}}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <br>
        <p class="mettreUnAvis">Votre avis compte!</p>
        <a href="{{route('show')}}">

            <button class="mettreUnAvisBoutton">Ecrire un commentaire </button>
        </a>
        <br><br>
    </div>
</div>


<!--articles-->
<div class="basic-1">
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <h1 class="mb-3 titleService">Quelques conseils pour ton futur job</h3>
                    <div class="col-12">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div>
                                                <a href="#">
                                                    <img class="img-fluid"
                                                         src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                                </a>
                                                <div class="card-body">
                                                    <h4 class="card-title"></h4>
                                                    <p class="card-text"></p>
                                                    <a href="#">
                                                        <p class="articleLink"><i class="far fa-newspaper"></i>Lire
                                                            l'article </p>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div>
                                                <a href="#">
                                                    <img class="img-fluid"
                                                         src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                                                </a>
                                                <div class="card-body">
                                                    <h4 class="card-title"></h4>
                                                    <p class="card-text"></p>
                                                    <a href="#">
                                                        <p class="articleLink">Lire l'article</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div>
                                                <a href="#">
                                                    <img class="img-fluid"
                                                         src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                                                </a>
                                                <div class="card-body">
                                                    <h4 class="card-title"></h4>
                                                    <p class="card-text"></p>
                                                    <a href="#">
                                                        <p class="articleLink">Lire l'article</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div>
                                                <a href="#">
                                                    <img class="img-fluid"
                                                         src="https://images.unsplash.com/photo-1532771098148-525cefe10c23?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3f317c1f7a16116dec454fbc267dd8e4">
                                                </a>
                                                <div class="card-body">
                                                    <h4 class="card-title"></h4>
                                                    <p class="card-text"></p>
                                                    <a href="#">
                                                        <p class="articleLink">Lire l'article</p>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div>
                                                <a href="#">
                                                    <img class="img-fluid"
                                                         src="https://images.unsplash.com/photo-1532715088550-62f09305f765?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ebadb044b374504ef8e81bdec4d0e840">
                                                </a>
                                                <div class="card-body">
                                                    <h4 class="card-title"></h4>
                                                    <p class="card-text"></p>
                                                    <a href="#">
                                                        <p class="articleLink">Lire l'article</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div>
                                                <a href="#">
                                                    <img class="img-fluid"
                                                         src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=0754ab085804ae8a3b562548e6b4aa2e">
                                                </a>
                                                <div class="card-body">
                                                    <h4 class="card-title"></h4>
                                                    <p class="card-text"></p>
                                                    <a href="#">
                                                        <p class="articleLink">Lire l'article</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div>
                                                <a href="#">
                                                    <img class="img-fluid"
                                                         src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
                                                </a>
                                                <div class="card-body">
                                                    <h4 class="card-title"></h4>
                                                    <p class="card-text"></p>
                                                    <a href="#">
                                                        <p class="articleLink">Lire l'article</p>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div>
                                                <a href="#">
                                                    <img class="img-fluid"
                                                         src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
                                                </a>
                                                <div class="card-body">
                                                    <h4 class="card-title"></h4>
                                                    <p class="card-text"></p>
                                                    <a href="#">
                                                        <p class="articleLink">Lire l'article</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div>
                                                <a href="#">
                                                    <img class="img-fluid"
                                                         src="https://images.unsplash.com/photo-1532763303805-529d595877c5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6">
                                                </a>
                                                <div class="card-body">
                                                    <h4 class="card-title"></h4>
                                                    <p class="card-text"></p>
                                                    <a href="#">
                                                        <p class="articleLink">Lire l'article</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn buttonPresentation btnplace mb-3 mr-1" href="#carouselExampleIndicators2"
                       role="button" data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn buttonPresentation btnplace1 mb-3 " href="#carouselExampleIndicators2" role="button"
                       data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
            </div>
        </div>
    </section>
</div>

<!-- application -->
<div class="basic-1 appsection">
    <div class="container">

        <div class="row align-items-end">
            <div class="col">
            </div>
            <div class="col" style="overflow:hidden;">
                <h1 class="titleApp">
                    Retrouvez-nous bientôt
                    sur vos téléphones !
                </h1>
                <button type="button" class="btn buttonApp"><i class="fas fa-mobile-alt"></i> Android</button>
                <button type="button" class="btn buttonApp"><i class="fas fa-mobile-alt"></i> Apple</button>
            </div>
        </div>
    </div>
    <br><br>
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
                            Plateforme de recherche d'emploi et de recrutement!
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
                        <form method="post" action="{{route('contact')}}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="text" name="nomContact" class="form-control" id="inputNom"
                                           required="required" placeholder="Nom">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="text" name="prenomContact" class="form-control" id="inputNomentreprise"
                                           required="required"
                                           placeholder="Nom entreprise">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="email" name="emailContact" class="form-control" id="inputEmail"
                                           required="required" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="sujet" name="objetContact" class="form-control" id="inputSujet"
                                           required="required" placeholder="Sujet">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="message" name="messageContact" class="form-control dimchamp"
                                           id="inputMessage" required="required"
                                           placeholder="Message">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
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
<script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>
