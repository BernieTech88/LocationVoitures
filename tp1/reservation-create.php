<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle réservation</title>
    <link rel="stylesheet" href="css/style-global.css">
</head>
<body>

    <div class="container">
        <form action="reservation-store.php" method="post">
            <h2>Nouvelle réservation</h2>

            <label>ID du client
                <input type="number" name="client_id" required>
            </label>

            <label>ID de la voiture
                <input type="number" name="voiture_id" required>
            </label>

            <label>Date début
                <input type="date" name="date_debut" required>
            </label>

            <label>Date fin
                <input type="date" name="date_fin" required>
            </label>

            <input type="submit" class="btn" value="Enregistrer">
        </form>

        <a href="reservation-index.php" class="btn" style="margin-top:15px;">Retour</a>
    </div>

</body>
</html>
