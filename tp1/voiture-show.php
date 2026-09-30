<?php
if(!isset($_GET['id']) || $_GET['id'] == null){
    header('location:voiture-index.php');
    exit;
}

require_once('classes/CRUD.php');
$crud = new CRUD;
$voiture = $crud->selectId('voitures', $_GET['id']);

if(!$voiture){
    header('location:voiture-index.php');
    exit;
}

extract($voiture);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la voiture</title>
    <link rel="stylesheet" href="css/style-global.css?v=1.0">
</head>
<body>

<h1>Détails de la voiture</h1>

<div class="container">

    <table>
        <tbody>
            <tr>
                <th>ID</th>
                <td><?= $id; ?></td>
            </tr>
            <tr>
                <th>Marque</th>
                <td><?= $marque; ?></td>
            </tr>
            <tr>
                <th>Modèle</th>
                <td><?= $modele; ?></td>
            </tr>
            <tr>
                <th>Année</th>
                <td><?= $annee; ?></td>
            </tr>
            <tr>
                <th>Immatriculation</th>
                <td><?= $immatriculation; ?></td>
            </tr>
            <tr>
                <th>Prix / jour</th>
                <td><?= $prix_jour; ?> $</td>
            </tr>
        </tbody>
    </table>

    <a href="voiture-edit.php?id=<?= $id; ?>" class="btn btn-green">Modifier</a>

    <form action="voiture-delete.php" method="post" style="display:inline-block; margin-left:10px;">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <input type="submit" value="Supprimer" class="btn red">
    </form>

    <a href="voiture-index.php" class="btn btn-back" style="margin-left:10px;">Retour</a>

</div>

</body>
</html>
