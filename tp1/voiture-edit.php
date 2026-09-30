<?php
if(!isset($_GET['id']) || $_GET['id'] == null){
    header('location:voiture-index.php');
    exit;
}

$id = $_GET['id'];

require_once('classes/CRUD.php');

$crud = new CRUD;
$voiture = $crud->selectId('voitures', $id);

if(!$voiture){
    header('location:voiture-index.php');
    exit;
}

extract($voiture); // crée $marque, $modele, $annee, $immatriculation, $prix_jour
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une voiture</title>
    <<link rel="stylesheet" href="css/style-global.css">
</head>
<body>

    <div class="container">
        <form action="voiture-update.php" method="post">
            <h2>Modifier une voiture</h2>

            <input type="hidden" name="id" value="<?= $id; ?>">

            <label>Marque
                <input type="text" name="marque" value="<?= htmlspecialchars($marque); ?>" required>
            </label>

            <label>Modèle
                <input type="text" name="modele" value="<?= htmlspecialchars($modele); ?>" required>
            </label>

            <label>Année
                <input type="number" name="annee" value="<?= htmlspecialchars($annee); ?>" required>
            </label>

            <label>Immatriculation
                <input type="text" name="immatriculation" value="<?= htmlspecialchars($immatriculation); ?>" required>
            </label>

            <label>Prix par jour
                <input type="number" step="0.01" name="prix_jour" value="<?= htmlspecialchars($prix_jour); ?>" required>
            </label>

            <input type="submit" class="btn" value="Enregistrer">
        </form>

        <a href="voiture-show.php?id=<?= $id; ?>" class="btn" style="margin-top:15px;">Retour</a>
    </div>

</body>
</html>
