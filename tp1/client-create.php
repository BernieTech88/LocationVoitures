<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau client</title>
    <link rel="stylesheet" href="css/style-global.css">
</head>
<body>

    <div class="container">
        <form action="client-store.php" method="post">
            <h2>Ajouter un client</h2>

            <label>Nom
                <input type="text" name="nom" required>
            </label>

            <label>Prénom
                <input type="text" name="prenom" required>
            </label>

            <label>Email
                <input type="email" name="email" required>
            </label>

            <label>Téléphone
                <input type="text" name="telephone">
            </label>

            <input type="submit" class="btn" value="Enregistrer">
        </form>

        <a href="client-index.php" class="btn" style="margin-top:15px;">Retour</a>
    </div>

</body>
</html>
