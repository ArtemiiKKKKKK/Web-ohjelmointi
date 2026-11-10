<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <title>Toimituskululaskuri</title>
</head>

<body>
    <h1>Laske toimituskulut</h1>
    <?php
    // 1. Switch-lausekkeen sisältävän funktion määrittely
    function calculateDeliveryCosts($shippingmethod)
    {
        switch ($shippingmethod) {
            case "Nouto":
                return 0.00;
            case "Postipaketti":
                return 6.90;
            case "Kotiinkuljetus":
                return 12.50;

            default:
                return -1;
        }
    }
    // 2. Funktion kutsuminen ja tulosten käsittely
    $selected_method = "Kotiinkuljetus";
    $price = calculateDeliveryCosts($selected_method);

    if ($price > -1) {
        echo "Valittu toimitustapa: " . $selected_method . "<br>";
        echo "<br>";
        echo "<strong>Toimituskulut: " . number_format($price, 2, ',', ' ') . " €</strong><br>";
    } else
        echo "Virheellinen toimitustapa";
    ?>
</body>

</html>