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
    <a href="{{route('admin.index')}}">
        <img src="{{asset('images/homeadmin.png')}}" alt="l" height="100" width="100">
    </a>
    <a href="{{route('admin.show')}}">
        <img src="{{asset('images/iconcandidat.png')}}" alt="p" height="100" width="100">
    </a>

    <br/>
    <hr>
    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Tableau de bord </h2>

        <table class="table table-striped table-primary">
            <tr>
                <th> NB Candidats</th>
                <th> NB Entreprises</th>
                <th> NB Offres</th>
                <th> NB Compétences</th>
                <th> NB Régions</th>
                <th> NB Candidatures</th>
                <th> NB Connexions Entreprises</th>
            </tr>
            <tr>
                <td>{{count($candidats)}}</td>
                <td>{{count($entreprises)}}</td>
                <td>{{count($offres)}}</td>
                <td>{{count($competences)}}</td>
                <td>{{count($regions)}}</td>
                <td>{{count($postulers)}}</td>
                <td>{{count($userlogs)}}</td>

            </tr>
        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Les connexions journaliers </h2>

        <table class="table table-striped table-secondary" aria-describedby="etude">
            <tr>
                <th> Jour</th>
                <th> NB Connexions</th>

            </tr>
            @foreach(nbconnexionparjour() as $nbconnexionparjour)
                <tr>
                    <td>
                        {{$nbconnexionparjour->jour}}
                    </td>
                    <td>
                        {{$nbconnexionparjour->nbconnexion}}
                    </td>
                </tr>
            @endforeach
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
                <th>Activite</th>

                <th>nombre d'offres</th>
                <th>nombre de candidatures</th>
                <th>Action</th>
            </tr>
            @foreach($entreprises as $entreprise)
                <tr>
                    <td>{{$entreprise->raisonSociale}}</td>
                    <td>{{$entreprise->descEntreprise}}</td>

                    <td>{{$entreprise->emailEntreprise}}</td>
                    <td>{{$entreprise->adresseEntreprise}}</td>
                    <td>{{$entreprise->villeEntreprise}}</td>
                    <td>{{$entreprise->activite->nomactivite}}</td>
                    <td>{{count($entreprise->offres)}}</td>
                    <td>{{$entreprise->nb_candidat()}}</td>

                    <td><a class="btn btn-danger" href="{{route('admin.entreprise', [$entreprise->numeroSiret])}}">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2>Entreprise Expiré</h2>

        <table class="table table-striped table-info">
            <tr>
                <th> Raison Sociale</th>
                <th> Description</th>
                <th>Émail</th>
                <th>adresse</th>
                <th>ville</th>

                <th>Action</th>
            </tr>
            @foreach($entreprisesArcho as $entreprise)
                <tr>
                    <td>{{$entreprise->raisonSociale}}</td>
                    <td>{{$entreprise->descEntreprise}}</td>
                    <td>{{$entreprise->emailEntreprise}}</td>
                    <td>{{$entreprise->adresseEntreprise}}</td>
                    <td>{{$entreprise->villeEntreprise}}</td>

                    <td><a class="btn btn-danger" href="{{route('admin.archiEntreprise', [$entreprise->numeroSiret])}}">Supprimer</a>
                    </td>
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
                    <td>{{$candidat->nomCandidat}}</td>
                    <td>{{$candidat->prenomCandidat}}</td>
                    <td>{{$candidat->emailCandidat}}</td>
                    <td>{{$candidat->adresseCandidat}}</td>
                    <td>{{$candidat->villeCandidat}}</td>

                    <td><a class="btn btn-danger"
                           href="{{route('admin.candidat', [$candidat->IDCandidat])}}">Supprimer</a></td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2>Candidat Expiré</h2>

        <table class="table table-striped table-success">
            <tr>
                <th> Nom</th>
                <th> Prénom</th>
                <th> Émail</th>
                <th> Adresse</th>
                <th> Ville</th>
                <th> Action</th>
            </tr>

            @foreach($candidatsArchi as $candidat)
                <tr>
                    <td>{{$candidat->nomCandidat}}</td>
                    <td>{{$candidat->prenomCandidat}}</td>
                    <td>{{$candidat->emailCandidat}}</td>
                    <td>{{$candidat->adresseCandidat}}</td>
                    <td>{{$candidat->villeCandidat}}</td>

                    <td><a class="btn btn-danger"
                           href="{{route('admin.archiCandidat', [$candidat->IDCandidat])}}">Supprimer</a></td>
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
                <th>NB Candidatures</th>
                <th>Action</th>
            </tr>

            @foreach($offres as $offre)
                <tr>
                    <td>{{$offre->titreOffre}}</td>
                    <td>{{$offre->descOffre}}</td>
                    <td>{{$offre->entreprise->raisonSociale}}</td>
                    <td>{{number_format($offre->remuneration, 2, ',', ' ')}} €</td>
                    <td>{{ $offre->dateDebutContrat}}</td>
                    <td>{{ $offre->dureeContrat}}</td>
                    <td>{{ $offre->statutOffre}}</td>
                    <td>{{count($offre->postuler)}}</td>



                    <td><a class="btn btn-danger" href="{{route('admin.offre', [$offre->IDOffre])}}">Supprimer</a></td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion Offre Expirée </h2>

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
            @foreach($offresExpire as $archioffre)

                <tr>
                    <td>{{$archioffre->titreOffre}}</td>
                    <td>{{$archioffre->descOffre}}</td>
                    <td>{{optional($archioffre->entreprise)->raisonSociale ? $archioffre->entreprise->raisonSociale : optional($archioffre->archientreprise)->raisonSociale}}</td>
                    <td>{{number_format($archioffre->remuneration, 2, ',', ' ')}} €</td>
                    <td>{{ $archioffre->dateDebutContrat}}</td>
                    <td>{{ $archioffre->dureeContrat}}</td>
                    <td>{{ $archioffre->statutOffre}}</td>

                    <td><a class="btn btn-danger" href="{{route('admin.archioffre', [$archioffre->IDOffre])}}">Supprimer</a></td>
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

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Les six compétences demandées </h2>

        <table class="table table-striped table-secondary" aria-describedby="etude">
            <tr>
                <th> Libellé</th>
                <th> Nb Demande</th>

            </tr>
            @foreach(competencePlusRecherche() as $competencePlusRecherche)
                <tr>
                    <td>
                        {{$competencePlusRecherche->Competences}}
                    </td>
                    <td>
                        {{$competencePlusRecherche->nb_demande}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> NB Entreprise par activité </h2>

        <table class="table table-striped table-secondary" aria-describedby="etude">
            <tr>
                <th> Libellé</th>
                <th> Nb Entreprise</th>

            </tr>
            @foreach(nbentrepriseparactivite() as $nbentrepriseparactivite)
                <tr>
                    <td>
                        {{$nbentrepriseparactivite->nomactivite}}
                    </td>
                    <td>
                        {{$nbentrepriseparactivite->nbentreprise}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart" width="200" height="50"></canvas>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['NB Candidats', 'NB Entreprises', 'NB Offres', 'NB Compétences', 'NB Régions', 'NB Candidatures'],
            datasets: [{
                label: 'Statistiques',
                data: [{{count($candidats)}},{{count($entreprises)}},{{count($offres)}},{{count($competences)}}, {{count($regions)}}, {{count($postulers)}}],
                backgroundColor: [
                    'rgb(0, 128, 128)',
                    'rgba(128, 0, 128)',
                    'rgba(240, 166, 202)',
                    'rgba(75, 192, 192)',
                    'rgba(174, 214, 241)'
                ],
                borderColor: [
                    'rgba(0, 0, 0, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 176, 38, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>



