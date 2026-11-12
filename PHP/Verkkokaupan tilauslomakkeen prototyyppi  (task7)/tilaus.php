<?php
// PHP-tehtävä 7: Tilauslomakkeen prototyyppi

// Kopioidaan funktio tehtävästä 6
function calculateDeliveryCosts($shippingmethod)
{
    switch ($shippingmethod) {
        case "nouto":
            return 0.00;
        case "postipaketti":
            return 6.90;
        case "kotiinkuljetus":
            return 12.50;

        default:
            return -1;
    }
}

// Alustetaan muuttujat, jotta ne ovat olemassa, vaikka lomaketta ei olisi lähetetty
$total = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST["amount"] ?? "";
    $deliveryMethod = $_POST["delivery_method"] ?? "";

    $price_pcs = 349.90;
    $subtotal = $amount * $price_pcs;
    $deliveryCost = calculateDeliveryCosts($deliveryMethod);
    $total = $subtotal + $deliveryCost;
}
?>
<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <title>Tilauslomake</title>
    <link rel="stylesheet" href="orderStyle.css">
</head>

<body>
    <div class="container">
        <form method="post" action="tilaus.php">
            <h1>Tilaa tuote</h1>

            <h3>Tuote: Sähköpotkulauta (349,90 €/kpl)</h3>

            <label for="numberInput">Määrä:</label><br>
            <input type="number" id="numberInput" name="amount" min="1"><br>

            <label for="deliveryMethod">Toimitustapa:</label><br>
            <select id="deliveryMethod" name="delivery_method">
                <option value="nouto">Nouto</option>
                <option value="postipaketti">Postipaketti</option>
                <option value="kotiinkuljetus">Kotiinkuljetus</option>
            </select><br>

            <button type="submit">Laske hinta</button><br>
        </form>

        <hr class="floating-line">

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h2>Tilauksen yhteenveto</h2><br>";
            echo "Määrä: " . $amount . " kpl<br>";
            echo "<br>";
            echo "Välisumma: " . number_format($subtotal, 2, ',', ' ') . " €<br>";
            echo "<br>";
            echo "Toimitustapa: " . $deliveryMethod . "<br>";
            echo "<br>";
            echo "Toimituskulut: " . number_format($deliveryCost, 2, ',', ' ') . " €<br>";
            echo "<br>";
            echo "<h3>Yhteensä: " . number_format($total, 2, ',', ' ') . " €</h3><br>";
        }
        ?>
    </div>
</body>

</html>