<!DOCTYPE html>
<html lang="en">
<?php include('Voiture.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $voitureDeJohnWick = new Voiture('mustang', 5, 'verte', 0, 60, 60, 0.22);
    
    
    echo '<br>';
    $voitureDeJohnWick->rouler(50);
    $voitureDeJohnWick->rouler(50);
    $voitureDeJohnWick->rouler(150);
    
    $voitureDeJohnWick->tableauDeBord();


    ?>

</body>

</html>