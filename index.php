<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <title>Home Partie 9</title>
    </head>
    <body>
        <?php
        for ($i = 1; $i <= 8; $i++) {
        ?>
        <p><a href="exercice<?= $i ?>/index.php">Exercice <?= $i ?></a></p>
        <?php
        }
        ?>
    </body>
</html>