<?php
if(!isset($_GET['id']) || $_GET['id'] == null){
    header('location:client-index.php');
    exit;
}

require_once('classes/CRUD.php');
$crud = new CRUD;
$client = $crud->selectId('clients', $_GET['id']);

if(!$client){
    header('location:client-index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du client</title>
    <link rel="stylesheet" href="css/style-global.css?v=1.0">
</head>
<body>

<h1>Détails du client</h1>

<div class="container">

    <table>
        <tbody>
            <tr>
                <th>ID</th>
                <td><?= $client['id']; ?></td>
            </tr>
            <tr>
                <th>Nom</th>
                <td><?= $client['nom']; ?></td>
            </tr>
            <tr>
                <th>Prénom</th>
                <td><?= $client['prenom']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $client['email']; ?></td>
            </tr>
            <tr>
                <th>Téléphone</th>
                <td><?= $client['telephone']; ?></td>
            </tr>
        </tbody>
    </table>

    <a href="client-edit.php?id=<?= $client['id']; ?>" class="btn btn-green">Modifier</a>

    <form action="client-delete.php" method="post" style="display:inline-block; margin-left:10px;">
        <input type="hidden" name="id" value="<?= $client['id']; ?>">
        <input type="submit" value="Supprimer" class="btn red">
    </form>

    <a href="client-index.php" class="btn btn-back" style="margin-left:10px;">Retour</a>

</div>

</body>
</html>
