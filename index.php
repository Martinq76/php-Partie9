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
        <p><a href="tp/index.php">TP</a></p>
    </body>
</html>