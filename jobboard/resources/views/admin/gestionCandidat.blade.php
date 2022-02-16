<!DOCTYPE html>
<html>
<head>
    <title>gestion offre</title>
</head>
<body>
<center>
    <h1> Espace Admin</h1>
    <a href="homeAdmin.html">
        <img src="{{asset('images/homeadmin)}}.png" height="100" width="100">
    </a>
    <a href="gestionCandidat.html">
        <img src="{{asset('images/iconcandidat)}}.jpg" height="100" width="100">
    </a>

    <a href="gestionEntreprise.html">
        <img src="{{asset('images/iconentreprise)}}.jpg" height="100" width="100">
    </a>
    <a href="gestionOffre.html">
        <img src="{{asset('images/iconjob)}}.jpg" height="100" width="100">
    </a>
    <h2> Insertion d'un candidat</h2>
    <form method="post">
        <table border="0">
            <tr>
                <td> Nom du candidat </td>
                <td> <input type="text" name="nom"></td>
            </tr>
            <tr>
                <td> Prénom du candidat </td>
                <td> <input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td> Email du candidat </td>
                <td> <input type="text" name="qualification"></td>
            </tr>
            <tr>
                <td> <input type="reset" name="Annuler" value="Annuler"></td>
                <td> <input type="submit" name="Valider" value="Valider"></td>
            </tr>
        </table>
    </form>
    <h3> </h3>
    <br/>

    <form method="post">
        Rechercher un candidat: <input type="text" name="mot">
        <input type="submit" name="Rechercher" value="Rechercher">
    </form>
    <br/>

    <table border="1">
        <tr>
            <td> Id Etudiant </td> <td> Nom Etudiant </td>
            <td> Prenom Etudiant </td> <td> Opération </td>
        </tr>
        <tr>
            <td> value</td>
            <td>value</td>
            <td> value</td>
            <td>
                <a href='index.php?page=1&action=sup&idtechnicien=".$unTechnicien['idvalue']."'><img src="{{asset('images/icondelete)}}.jpg" height='40' width='30'></a>

                <a href='index.php?page=1&action=edit&idtechnicien=".$unTechnicien['idvalue']."'><img src="{{asset('images/iconedit)}}.png" height='40' width='30'></a>

            </td>
        </tr>
    </table>
</center>
</body>
</html>
