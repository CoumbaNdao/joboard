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

<header id="header" class="bodyConnexion">
    <a class="navbar-brand logo-image" href="{{route('index')}}"><img class="dimLogo" src="{{asset('images/logo.png')}}" alt="alternative"></a>
    <div class="container">
        <div class="row emplacementFormPost">
            <div class="col-10 customFormCand">
                <br>
                <h1>Candidature</h1>
                <form accept-charset="UTF-8" action="{{route('candidat.send', [$offre->IDOffre])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="fullname" disabled class="form-control" id="exampleInputName" placeholder="Nom et Prénom" required="required" value="{{$candidat->nomCandidat . ' ' . $candidat->prenomCandidat }}">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" disabled value="{{$candidat->emailCandidat}}" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" disabled value="{{$candidat->adresseCandidat}}" class="form-control" id="inputAddress" placeholder="Adresse">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <input type="text" name="zipCode" disabled value="{{$candidat->cpCandidat}}" class="form-control" id="inputZip" placeholder="Code Postal">
                        </div>
                        <div class="form-group col-md-10">
                            <input type="text" name="city" disabled value="{{$candidat->villeCandidat}}" class="form-control" id="inputCity" placeholder="Ville">
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="nomRegion" type="tel" disabled value="{{$candidat->region->nomRegion}}" id="inputAddress">
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="telephoneCandidat" disabled value=" {{$candidat->telephoneCandidat}}" type="tel" disabled ="example-tel-input">
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="libelleCompetence" disabled value=" Compétences pour ce poste"  id="example-tel-input">
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="niveauEtudeDiplome" disabled value=" Dernier diplôme obtenu"  id="example-tel-input">
                    </div>

                    <div class="form-group">
                        <label for="example-date-input" class="col-3 col-form-label">Disponible à partir de :</label>
                        <input class="form-control" name="starting_date" type="text" disabled value="25/10/2025" id="example-date-input">
                    </div>
                    <div class="form-group mt-3">
                        <label class="mr-4">Joindre votre CV:</label>
                        <input type="file" name="CVCandidat">
                    </div>
                    <center><button type="submit" class="btn btn-primary">Envoyer</button></center>
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
</html><?php
