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
                <th> NB Type offre</th>
                <th> NB TypeCompétence</th>
                <th> NB Compétence</th>
                <th> NB Région</th>
                <th> NB Partenaire</th>
            </tr>
            <tr>
                <td>{{count($typeOffres)}}</td>
                <td>{{count($typeCompetences)}}</td>
                <td>{{count($competences)}}</td>
                <td>{{count($regions)}}</td>
                <td>{{count($partenaires)}}</td>

            </tr>
        </table>
    </div>


    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2>Gestion des Partenaire</h2>

        <table class="table col-12 table-striped table-info">
            <thead>
            <tr>
                <th> Siret</th>
                <th> Raison Sociale</th>
                <th> Siège</th>
                <th> Code postal</th>
                <th> ville</th>
                <th> contact</th>
                <th> Date debut partenariat</th>
                <th> logo</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($partenaires as $partenaire)
                <form method="post" action="{{route('admin.partenaire', [$partenaire->SiretPartenaire])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="SiretPartenaire" placeholder="Numero Siret"
                                   class="form-control" value="{{$partenaire->SiretPartenaire}}">
                        </td>
                        <td> <input type="text" name="RaisonSocialePartenaire" placeholder="Raison Sociale"
                                    class="form-control" value="{{$partenaire->RaisonSocialePartenaire}}">
                        </td>

                        <td> <input type="text" name="siegePartenaire" placeholder="Siege social"
                                    class="form-control" value="{{$partenaire->siegePartenaire}}">

                        </td>

                        <td> <input type="text" name="cpPartenaire" placeholder="Code postal"
                                    class="form-control" value="{{$partenaire->cpPartenaire}}">
                        </td>
                        <td><input type="text" name="villePartenaire" placeholder="Ville"
                                   class="form-control" value="{{$partenaire->villePartenaire}}">
                        </td>

                        <td> <input type="email" name="contactPartenaire" placeholder="Contact"
                                    class="form-control" value="{{$partenaire->contactPartenaire}}">
                        </td>

                        <td> <input type="date" name="dateDebutPartenariat" placeholder="Date début partenariat"
                                    class="form-control" value="{{$partenaire->dateDebutPartenariat}}">
                        </td>

                        <td>...
                        </td>


                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.creerPartenaire')}}" enctype="multipart/form-data">
                @csrf
                <tr>
                    <td><input type="text" name="SiretPartenaire" placeholder="Numero Siret"
                               class="form-control">
                    </td>
                    <td><input type="text" name="RaisonSocialePartenaire" placeholder="Raison Sociale"
                               class="form-control">
                    </td>

                    <td><input type="text" name="siegePartenaire" placeholder="Siege social"
                               class="form-control">
                    </td>

                    <td><input type="text" name="cpPartenaire" placeholder="Code postal"
                               class="form-control">
                    </td>


                    <td><input type="text" name="villePartenaire" placeholder="Ville"
                               class="form-control">
                    </td>

                    <td><input type="email" name="contactPartenaire" placeholder="Contact"
                               class="form-control">
                    </td>

                    <td><input type="date" name="dateDebutPartenariat" placeholder="Date début partenariat"
                               class="form-control">
                    </td>

                    <td><input type="file" name="logoPartenaire" placeholder="Logo"
                               class="form-control">
                    </td>
                    <td>
                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
    </div>


    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2>Gestion Type Offre</h2>

        <table class="table table-striped table-info">
            <tr>
                <th> Libellé</th>
                <th>Action</th>

            </tr>
            @foreach($typeOffres as $typeOffre)

                <form method="post" action="{{route('admin.typeOffre', [$typeOffre->IDTypeOffre ])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="libelleTypeOffre" value="{{$typeOffre->libelleTypeOffre}}"
                                   class="form-control"></td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.typeOffre')}}">
                @csrf
                <tr>
                    <td><input type="text" name="libelleTypeOffre" required placeholder="Entre votre type d'offre"
                               class="form-control"></td>
                    <td>

                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>


    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2>Gestion Type Compétence</h2>

        <table class="table table-striped table-success">
            <tr>
                <th> Libellé</th>
                <th>Action</th>

            </tr>
            @foreach($typeCompetences as $typeCompetence)

                <form method="post" action="{{route('admin.typeCompetence', [$typeCompetence->IDTypeCompetence])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="libelleTypeCompetence"
                                   value="{{$typeCompetence->libelleTypeCompetence}}" class="form-control"></td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.typeCompetence')}}">
                @csrf
                <tr>
                    <td><input type="text" name="libelleTypeCompetence" required
                               placeholder="Entre votre type de competence" class="form-control"></td>
                    <td>

                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion Compétence </h2>

        <table class="table table-striped table-secondary">
            <tr>
                <th> Libellé</th>
                <th>Action</th>

            </tr>
            @foreach($competences as $competence)

                <form method="post" action="{{route('admin.competence', [$competence->IDCompetence])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="libelleCompetence" value="{{$competence->libelleCompetence}}"
                                   class="form-control"></td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.competence')}}">
                @csrf
                <tr>
                    <td><input type="text" name="libelleCompetence" required placeholder="Entre votre competence"
                               class="form-control"></td>
                    <td>

                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion Région </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Libellé</th>
                <th>Action</th>

            </tr>
            @foreach($regions as $region)



                <form method="post" action="{{route('admin.region', [$region->codePostalRegion])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="nomRegion" value="{{$region->nomRegion}}" class="form-control">
                        </td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.region')}}">
                @csrf
                <tr>
                    <td><input type="text" name="nomRegion" required placeholder="Entre votre region"
                               class="form-control"></td>
                    <td>

                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion Type Compétence</h2>

        <table class="table table-striped table-danger">

            <form method="post" action="{{route('admin.lien')}}">
                @csrf
                <tr>

                    <th>
                        Intitulé
                    </th>
                    <th>
                        Valeur
                    </th>
                </tr>
                <tr>
                    <td>
                        Compétence
                    </td>
                    <td>
                        <select class="form-control" type="text" name="IDCompetence" required>
                            @foreach($competences as $competence2)
                                <option
                                    value="{{$competence2->IDCompetence}}">{{$competence2->libelleCompetence}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Type Compétence
                    </td>
                    <td>
                        <select class="form-control" type="text" name="IDTypeCompetence" required>
                            @foreach($typeCompetences as $typeCompetence2)
                                <option
                                    value="{{$typeCompetence2->IDTypeCompetence}}">{{$typeCompetence2->libelleTypeCompetence}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>

    </div>

</div>

</body>
</html>



