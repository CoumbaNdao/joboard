<!DOCTYPE html>
<html>
<head>
    <title>gestion entreprise</title>
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
    <h2> Insertion d'une Entreprise</h2>
    <form method="post">
        <table border="0">
            <tr>
                <td> Raison sociale de l'entreprise </td>
                <td> <input type="text" name="nom"></td>
            </tr>
            <tr>
                <td> Adresse de l'entreprise </td>
                <td> <input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td> Code postal de l'entreprise </td>
                <td> <input type="text" name="qualification"></td>
            </tr>
            <tr>
                <td> Ville de l'entreprise </td>
                <td> <input type="text" name="email"></td>
            </tr>
            <tr>
                <td> Numéro de téléphone de l'entreprise </td>
                <td> <input type="text" name="email"></td>
            </tr>
            <tr>
                <td> E-mail de l'entreprise </td>
                <td> <input type="text" name="email"></td>
            </tr>
            <tr>
                <td> <input type="reset" name="Annuler" value="Annuler"></td>
                <td> <input type="submit" name="Valider" value="Valider"></td>
            </tr>
        </table>
    </form>
    <h3> Liste des Entreprises </h3>
    <br/>

    <form method="post">
        Rechercher une entreprise: <input type="text" name="mot">
        <input type="submit" name="Rechercher" value="Rechercher">
    </form>
    <br/>

    <table border="1">
        <tr>
            <td> Id Entreprise </td> <td> Raison Sociale </td>
            <td> Adresse </td> <td> Code Postal </td>
            <td> Ville </td> <td> Description Entreprise  </td>
            <td> Tel Entreprise </td> <td> E-mail Entreprise </td><td> Opération </td>
        </tr>
        <tr>
            <td> value</td>
            <td> value</td>
            <td> value</td>
            <td> value</td>
            <td> value</td>
            <td> value</td>
            <td> value</td>
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
