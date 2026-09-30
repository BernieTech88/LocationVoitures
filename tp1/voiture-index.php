<?php
require_once('classes/CRUD.php');
$crud = new CRUD;
$voitures = $crud->select('voitures');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des voitures</title>
    <link rel="stylesheet" href="css/style-global.css?v=1.0">
</head>
<body>

<h1>Liste des voitures</h1>

<div class="container">

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Année</th>
                <th>Immatriculation</th>
                <th>Prix / jour</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($voitures as $v): ?>
            <tr>
                <td><?= $v['id']; ?></td>
                <td><?= $v['marque']; ?></td>
                <td><?= $v['modele']; ?></td>
                <td><?= $v['annee']; ?></td>
                <td><?= $v['immatriculation']; ?></td>
                <td><?= $v['prix_jour']; ?> $</td>
                <td>
                    <a href="voiture-show.php?id=<?= $v['id']; ?>" class="btn-blue">Voir</a>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="voiture-create.php" class="btn btn-green">Ajouter une voiture</a>
    <a href="index.php" class="btn btn-back" style="margin-left:10px;">Retour à l'accueil</a>

</div>

</body>
</html>
