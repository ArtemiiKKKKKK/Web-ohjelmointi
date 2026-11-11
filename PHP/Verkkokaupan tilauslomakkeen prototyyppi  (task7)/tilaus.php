<?php
// PHP-tehtävä 7: Tilauslomakkeen prototyyppi

// Kopioidaan funktio tehtävästä 6
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

// Alustetaan muuttujat, jotta ne ovat olemassa, vaikka lomaketta ei olisi lähetetty
$yhteenveto = null;

// Tarkistetaan, onko lomake lähetetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haetaan tiedot lomakkeelta


    // Tuotetiedot


    // Laskutoimitukset


    // Rakennetaan yhteenveto-muuttuja tulostusta varten


}
?>
<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <title>Tilauslomake</title>
    <style>


    </style>
</head>

<body>
    <div class="container">
        <form method="post" action="tilaus.php">
            <h3>Tuote: Sähköpotkulauta (349,90 €/kpl)</h3>
            <label></label>
        </form>

        <?php
        // Tulostetaan yhteenveto, jos se on laskettu

        ?>
    </div>
</body>

</html>