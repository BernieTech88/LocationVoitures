<?php
if(!isset($_GET['id']) || $_GET['id'] == null){
    header('location:client-index.php');
    exit;
}

$id = $_GET['id'];

require_once('classes/CRUD.php');

$crud = new CRUD;
$client = $crud->selectId('clients', $id);

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
    <title>Modifier client</title>
   <link rel="stylesheet" href="css/style-global.css">
</head>
<body>

    <div class="container">
        <form action="client-update.php" method="post">
            <h2>Modifier un client</h2>

            <input type="hidden" name="id" value="<?= $client['id']; ?>">

            <label>Nom
                <input type="text" name="nom" value="<?= htmlspecialchars($client['nom']); ?>">
            </label>

            <label>Prénom
                <input type="text" name="prenom" value="<?= htmlspecialchars($client['prenom']); ?>">
            </label>

            <label>Email
                <input type="email" name="email" value="<?= htmlspecialchars($client['email']); ?>">
            </label>

            <label>Téléphone
                <input type="text" name="telephone" value="<?= htmlspecialchars($client['telephone']); ?>">
            </label>

            <input type="submit" class="btn" value="Enregistrer">
        </form>

        <a href="client-index.php" class="btn" style="margin-top:15px;">Retour</a>
    </div>

</body>
</html>
