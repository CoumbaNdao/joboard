<!DOCTYPE html>
<html>
<head>
    <title>admin</title>

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!-- Favicon  -->
    <link rel="icon" href="{{asset('images/CoumbAnneFavicon.png')}}">
</head>
<body>
<div class="container text-center">
    <h1> Espace Admin</h1>
    <a href="homeAdmin.html">
        <img src="{{asset('images/homeadmin.png')}}" height="100" width="100">
    </a>
    <a href="gestionCandidat.html">
        <img src="{{asset('images/iconcandidat.png')}}" height="100" width="100">
    </a>

    <a href="gestionEntreprise.html">
        <img src="{{asset('images/iconentreprise.jpg')}}" height="100" width="100">
    </a>
    <a href="gestionOffre.html">
        <img src="{{asset('images/iconjob.jpg')}}" height="100" width="100">
    </a>

    <br/>

    <hr>


    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Tableau de bord </h2>

    <table class="table table-striped table-primary">
        <tr>
            <th> NB Candidat</th>
            <th> NB Entreprise</th>
            <th> NB Offre</th>
        </tr>
        <tr>
            <td>{{count($candidats)}}</td>
            <td>{{count($entreprises)}}</td>
            <td>{{count($offres)}}</td>

        </tr>
    </table>
    </div>


    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2>Gestion Entreprise</h2>

        <table class="table table-striped table-info">
            <tr>
                <th> Raison Sociale</th>
                <th> Description</th>
                <th>Émail</th>
                <th>adresse</th>
                <th>ville</th>
                <th>nombre d'offres</th>
                <th>nombre de candidatures</th>

                <th>Action</th>
            </tr>
            @foreach($entreprises as $entreprise)
                <tr>
                    <td >{{$entreprise->raisonSociale}}</td>
                    <td >{{$entreprise->descEntreprise}}</td>

                    <td>{{$entreprise->emailEntreprise}}</td>
                    <td>{{$entreprise->adresseEntreprise}}</td>
                    <td>{{$entreprise->villeEntreprise}}</td>
                    <td>{{count($entreprise->offres)}}</td>
                    <td>{{$entreprise->nb_candidat()}}</td>

                    <td> <a class="btn btn-danger" href="{{route('admin.entreprise', [$entreprise->numeroSiret])}}">Supprimer</a></td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2>Gestion candidat</h2>

        <table class="table table-striped table-success">
            <tr>
                <th> Nom</th>
                <th> Prénom</th>
                <th> Émail</th>
                <th> Adresse</th>
                <th> Ville</th>
                <th> Action</th>
            </tr>

            @foreach($candidats as $candidat)
            <tr>
                <td >{{$candidat->nomCandidat}}</td>
                <td>{{$candidat->prenomCandidat}}</td>
                <td>{{$candidat->emailCandidat}}</td>
                <td>{{$candidat->adresseCandidat}}</td>
                <td>{{$candidat->villeCandidat}}</td>

                <td> <a class="btn btn-danger" href="{{route('admin.candidat', [$candidat->IDCandidat])}}">Supprimer</a></td>
            </tr>
                @endforeach
        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion Offre </h2>

        <table class="table table-striped table-secondary">
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Entreprise</th>
                <th>Rémunération</th>
                <th>Debut Contrat</th>
                <th>Durée Contrat</th>
                <th>État</th>
                <th>Action</th>
            </tr>
            @foreach($offres as $offre)
                <tr>
                    <td >{{$offre->titreOffre}}</td>
                    <td >{{$offre->descOffre}}</td>
                    <td>{{$offre->entreprise->raisonSocial}}</td>
                    <td>{{number_format($offre->remuneration, 2, ',', ' ')}} €</td>
                    <td>{{ $offre->dateDebutContrat}}</td>
                    <td>{{ $offre->dureeContrat}}</td>
                    <td>{{ $offre->statutOffre}}</td>

                    <td> <a class="btn btn-danger" href="{{route('admin.offre', [$offre->IDOffre])}}">Supprimer</a></td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion Région </h2>

        <table class="table table-striped table-warning" aria-describedby="table">
            <tr>
                <th> Libellé</th>
                <th> Nb entreprises</th>
                <th> Nb candidats</th>


            </tr>
            @foreach($regions as $region)
                <tr>
                    <td>
                        {{$region->nomRegion}}
                    </td>
                    <td>{{count($region->entreprises)}}</td>
                    <td>{{count($region->candidats)}}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion Compétence/offre </h2>

        <table class="table table-striped table-secondary" aria-describedby="competence">
            <tr>
                <th> Libellé</th>
                <th> NB offre</th>
                <th> NB candidat</th>


            </tr>

            @foreach($competences as $competence)
                <tr>
                    <td>
                        {{$competence->libelleCompetence}}
                    </td>
                    <td>
                        {{$competence->nbOffres()}}
                    </td>
                    <td>
                        {{$competence->nbCandidats()}}
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion Niveau d'étude/offre </h2>

        <table class="table table-striped table-secondary" aria-describedby="etude">
            <tr>
                <th> Libellé</th>
                <th> Nb Offre</th>
                <th> Nb Candidat</th>
            </tr>
            @foreach($niveauEtudes as $niveauEtude)
                <tr>
                    <td>
                        {{$niveauEtude->libelleNiveauEtude}}
                    </td>
                    <td>
                        {{count($niveauEtude->offres)}}
                    </td>


                    <td>
                        {{count($niveauEtude->candidats)}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</div>

</body>
</html>



