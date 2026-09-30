<?php
require_once('classes/CRUD.php');
$crud = new CRUD;
$clients = $crud->select('clients');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des clients</title>
    <link rel="stylesheet" href="css/style-global.css?v=1.0">
</head>
<body>

<h1>Liste des clients</h1>

<div class="container">

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($clients as $c): ?>
            <tr>
                <td><?= $c['id']; ?></td>
                <td><?= $c['nom']; ?></td>
                <td><?= $c['prenom']; ?></td>
                <td><?= $c['email']; ?></td>
                <td><?= $c['telephone']; ?></td>
                <td>
                   <a href="client-show.php?id=<?= $c['id']; ?>" class="btn-blue">Voir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="client-create.php" class="btn btn-green">Nouveau client</a>
    <a href="index.php" class="btn btn-back" style="margin-left:10px;">Retour à l'accueil</a>

</div>

</body>
</html>
