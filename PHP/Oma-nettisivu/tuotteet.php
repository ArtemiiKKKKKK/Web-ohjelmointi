<?php

$products = [
    [
        'name' => 'Langaton hiiri',
        'price' => 24.90,
    ],
    [
        'name' => 'Mekaaninen näppäimistö',
        'price' => 79.00,
    ],
    [
        'name' => 'USB-C-kaapeli',
        'price' => 9.95,
    ],
    [
        'name' => 'Sähköpotkulauta',
        'price' => 349.90,
    ]
];

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

$total = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST["amount"] ?? "";
    $deliveryMethod = $_POST["delivery_method"] ?? "";
    $price_pcs = $_POST["itemPrice"] ?? "";

    $subtotal = $amount * $price_pcs;
    $deliveryCost = calculateDeliveryCosts($deliveryMethod);
    $total = $subtotal + $deliveryCost;
}
?>

<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <title>Tuotteet - Meidän Firma</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php include 'navigaatio.php'; ?>
    </header>
    <main>
        <h1>Tilaa tuote</h1>
        <form method="post" action="tuotteet.php">
            <label for="itemInput">Tuote:</label><br>
            <select name="chosenItem" id="chosen_item">

                <?php foreach ($products as $product): ?>
                    <option value="<?php echo $product['name']; ?>"><?php echo $product['name'];?> (<?php echo number_format($product['price'], 2, ',', ' '); ?>€)</option>
                <?php endforeach; ?>

            </select>

            <br><br><label for="numberInput">Määrä:</label><br>
            <input type="number" id="numberInput" name="amount" min="1"><br>

            <br><label for="deliveryMethod">Toimitustapa:</label><br>
            <select id="deliveryMethod" name="delivery_method">
                <option value="nouto">Nouto</option>
                <option value="postipaketti">Postipaketti</option>
                <option value="kotiinkuljetus">Kotiinkuljetus</option>
            </select><br>

            <br><button type="submit">Laske hinta</button><br>
        </form>
    </main>
</body>

</html>