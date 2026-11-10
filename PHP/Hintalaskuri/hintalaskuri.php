<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <title>Hintalaskuri</title>
</head>

<body>
    <?php
    // 1. Muuttujien maarittely (Defining variables)
    $product_name = "Sähköpotkulauta";
    $price_pcs = 349.90;
    $amount_pcs = 2;
    $discount_percent = 15;

    // 2. Laskutoimitukset (Calculations)
    $subtotal = ($price_pcs * $amount_pcs);
    $discount_eur = ($subtotal * ($discount_percent / 100));
    $finalsum = ($subtotal - $discount_eur);

    // 3. Tietojen tulostus selaimelle (Printing data to the browser)
    echo "<h1>Tuotteen hintatiedot</h1>";
    
    echo "Tuote: " . $product_name . "<br>";
    echo "Kappalehinta: " . number_format($price_pcs, 2, ',', ' ') . " € <br>";
    echo "Määrä: " . $amount_pcs . " kpl <br>";

    for ($i = 1; $i <= 27; $i++) {
        echo "-";
    }
    echo "<br>";

    echo "Välisumma: " . number_format($subtotal, 2, ',', ' ') . " € <br>";
    echo "Alennus(15%): " . number_format($discount_eur, 2, ',', ' ') . " € <br>";

    for ($i = 1; $i <= 27; $i++) {
        echo "-";
    }
    echo "<br>";

    echo "<strong>Lopullinen hinta: " . number_format($finalsum, 2, ',', ' ') . " € </strong><br>";
    // number_format() muotoilee luvun. Esim: number_format(luku, desimaalien_maara, desimaalierotin, tuhaterotin)
    // number_format() formats a number. For example: number_format(number, number_of_decimals, decimal separator, thousand separator) 
    ?>
</body>

</html>