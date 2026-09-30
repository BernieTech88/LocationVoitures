<?php
if(!isset($_GET['id']) || $_GET['id'] == null){
    header('location:reservation-index.php');
    exit;
}

$id = $_GET['id'];

require_once('classes/CRUD.php');

$crud = new CRUD;
$reservation = $crud->selectId('reservations', $id);

if(!$reservation){
    header('location:reservation-index.php');
    exit;
}

extract($reservation);
// crée $client_id, $voiture_id, $date_debut, $date_fin, $total

$client = $crud->selectId('clients', $client_id);
$voiture = $crud->selectId('voitures', $voiture_id);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la réservation</title>
    <link rel="stylesheet" href="css/style-global.css?v=1.0">
</head>
<body>

    <h1>Détails de la réservation</h1>

    <div class="container">

        <table>
            <tbody>
                <tr>
                    <th>Client</th>
                    <td><?= $client['nom']; ?> <?= $client['prenom']; ?></td>
                </tr>

                <tr>
                    <th>Voiture</th>
                    <td><?= $voiture['marque']; ?> <?= $voiture['modele']; ?></td>
                </tr>

                <tr>
                    <th>Date début</th>
                    <td><?= $date_debut; ?></td>
                </tr>

                <tr>
                    <th>Date fin</th>
                    <td><?= $date_fin; ?></td>
                </tr>

                <tr>
                    <th>Total</th>
                    <td><?= $total; ?> $</td>
                </tr>
            </tbody>
        </table>

        <form action="reservation-delete.php" method="post" style="display:inline-block;">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="submit" value="Supprimer" class="btn red">
        </form>

        <a href="reservation-index.php" class="btn btn-back" style="margin-left:10px;">Retour</a>

    </div>

</body>
</html>
