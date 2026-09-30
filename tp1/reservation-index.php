<?php
require_once('classes/CRUD.php');

$crud = new CRUD;
$reservations = $crud->select('reservations', 'date_debut', 'DESC');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des réservations</title>
   <link rel="stylesheet" href="css/style-global.css">
</head>
<body>

    <h1>Liste des réservations</h1>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Voiture</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Total</th>
                    <th>Détails</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($reservations as $r){
                    $client = $crud->selectId('clients', $r['client_id']);
                    $voiture = $crud->selectId('voitures', $r['voiture_id']);
                ?>
                <tr>
                    <td><?= htmlspecialchars($client['nom']); ?> <?= htmlspecialchars($client['prenom']); ?></td>

                    <td><?= htmlspecialchars($voiture['marque']); ?> <?= htmlspecialchars($voiture['modele']); ?></td>

                    <td><?= htmlspecialchars($r['date_debut']); ?></td>
                    <td><?= htmlspecialchars($r['date_fin']); ?></td>

                    <td><?= htmlspecialchars($r['total']); ?> $</td>

                    <td>
                        <a href="reservation-show.php?id=<?= $r['id']; ?>" class="btn">Voir</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>


        <a href="reservation-create.php" class="btn btn-green">Nouvelle réservation</a>
        <a href="index.php" class="btn btn-back" style="margin-left:10px;">Retour à l'accueil</a>
    </div>

</body>
</html>
