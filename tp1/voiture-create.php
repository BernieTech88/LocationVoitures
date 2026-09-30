<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une voiture</title>
    <<link rel="stylesheet" href="css/style-global.css">
</head>
<body>

    <div class="container">
        <form action="voiture-store.php" method="post">
            <h2>Nouvelle voiture</h2>

            <label>Marque
                <input type="text" name="marque" required>
            </label>

            <label>Modèle
                <input type="text" name="modele" required>
            </label>

            <label>Année
                <input type="number" name="annee" required>
            </label>

            <label>Immatriculation
                <input type="text" name="immatriculation" required>
            </label>

            <label>Prix par jour
                <input type="number" step="0.01" name="prix_jour" required>
            </label>

            <input type="submit" class="btn" value="Enregistrer">
        </form>

        <a href="voiture-index.php" class="btn" style="margin-top:15px;">Retour</a>
    </div>

</body>
</html>
