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
    <table class="table table-striped table-secondary">
        <tr>
            <th> Libellé</th>
            <th> Diplome</th>
            <th>Action</th>

        </tr>
    @foreach($niveauEtudes as $niveauEtude)

        <form method="post" action="{{route('admin.niveauEtude', [$niveauEtude->IDNiveauEtude ])}}">
            @csrf
            <tr>
                <td>
                    <input type="text" name="libelleNiveauEtude" value="{{$niveauEtude->libelleNiveauEtude}}"
                           class="form-control">
                </td>

                <td>
                    <input type="text" name="diplomeObtenu" value="{{$niveauEtude->diplomeObtenu}}"
                           class="form-control">
                </td>
                <td>
                    <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                    <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                </td>
            </tr>
        </form>

    @endforeach

        <form method="post" action="{{route('admin.creerNiveauEtude')}}">
            @csrf
            <tr>
                <td>
                    <input type="text" name="libelleNiveauEtude"
                           class="form-control">
                </td>

                <td>
                    <input type="text" name="diplomeObtenu"
                           class="form-control">
                </td>
                <td>

                    <input type="submit" name="Valider" value="Créer" class="btn btn-success">
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
        <h2> Gestion Activite </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Code APE</th>
                <th> Libellé</th>
                <th>Action</th>

            </tr>
            @foreach($activites as $activite)



                <form method="post" action="{{route('admin.activite', [$activite->codeape])}}">
                    @csrf
                    <tr>

                        <td><input type="text" name="codeape" value="{{$activite->codeape}}" class="form-control">
                        </td>
                        <td><input type="text" name="nomactivite" value="{{$activite->nomactivite}}" class="form-control">
                        </td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.activite')}}">
                @csrf
                <tr>
                    <td><input type="text" name="codeape" required placeholder="Entrer votre Code APE"
                               class="form-control"></td>

                    <td><input type="text" name="nomactivite" required placeholder="Entrer votre activité"
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
{{--            @dd(nbconnexionparjour()->pluck('jour'))--}}
        </table>
    </div>


    <div id="nbV"  data-val="{{nbconnexionparjour()->pluck('nbconnexion')}}"  data-val1="{{nbconnexionparjour()->pluck('jour')}}"></div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart" width="200" height="50"></canvas>
<script>
    let div = document.getElementById('nbV');

    let nb = div.getAttribute('data-val');
    let jour = div.getAttribute('data-val1');


   nb = nb.replaceAll('"', '').replace('[', '').replaceAll('\\', '').replace(']', '').split(',');
jour = jour.replaceAll('"', '').replace('[', '').replaceAll('\\', '').replace(']', '').split(',')

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            {{--labels: {{nbconnexionparjour()->pluck('jour')}},--}}
            labels: jour,
            datasets: [{
                label: 'Nombre de connexions des 6 derniers',
                {{--data: [{{nbconnexionparjour()->pluck('nbconnexion')}}],--}}
                data: nb,
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





<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
  overflow-y: hidden;
}
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: false,
  panY: false,
  wheelX: "panX",
  wheelY: "zoomX",
  layout: root.verticalLayout
}));


// Add legend
// https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
var legend = chart.children.push(am5.Legend.new(root, {
  centerX: am5.p50,
  x: am5.p50
}));

var data = [{
  "year": "Lundi",
  "europe": 2.5,
  "namerica": 2.5,
}, {
  "year": "Mardi",
  "europe": 2.6,
  "namerica": 2.7,
}, {
  "year": "Mercredi",
  "europe": 2.6,
  "namerica": 2.7,

}, {
  "year": "Jeudi",
  "europe": 2.8,
  "namerica": 2.9,

},  {
  "year": "Vendredi",
  "europe": 2.6,
  "namerica": 2.7,

}];


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  categoryField: "year",
  renderer: am5xy.AxisRendererX.new(root, {
    cellStartLocation: 0.1,
    cellEndLocation: 0.9
  }),
  tooltip: am5.Tooltip.new(root, {})
}));

xAxis.data.setAll(data);

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  min: 0,
  renderer: am5xy.AxisRendererY.new(root, {})
}));


// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
function makeSeries(name, fieldName, stacked) {
  var series = chart.series.push(am5xy.ColumnSeries.new(root, {
    stacked: stacked,
    name: name,
    xAxis: xAxis,
    yAxis: yAxis,
    valueYField: fieldName,
    categoryXField: "year"
  }));

  series.columns.template.setAll({
    tooltipText: "{name}, {categoryX}:{valueY}",
    width: am5.percent(90),
    tooltipY: am5.percent(10)
  });
  series.data.setAll(data);

  // Make stuff animate on load
  // https://www.amcharts.com/docs/v5/concepts/animations/
  series.appear();

  series.bullets.push(function () {
    return am5.Bullet.new(root, {
      locationY: 0.5,
      sprite: am5.Label.new(root, {
        text: "{valueY}",
        fill: root.interfaceColors.get("alternativeText"),
        centerY: am5.percent(50),
        centerX: am5.percent(50),
        populateText: true
      })
    });
  });

  legend.data.push(series);
}

makeSeries("Europe", "europe", false);
makeSeries("North America", "namerica", true);

// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
chart.appear(1000, 100);

}); // end am5.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
