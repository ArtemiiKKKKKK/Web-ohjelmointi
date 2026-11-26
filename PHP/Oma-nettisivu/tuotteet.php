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
    ],
    [
        'name' => 'Mysteerinen tuote',
        'price' => 1499999.35,
    ]
];

function calculateDeliveryCosts($shippingmethod): float
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

function processSubmittedData($productsArray): array
{
    $amount = (int) ($_POST["amount"] ?? 1);
    $deliveryMethod = $_POST["delivery_method"] ?? "nouto";
    $chosenItem = $_POST["chosenItem"] ?? "";
    $price_pcs = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST["amount"] ?? "";
    $deliveryMethod = $_POST["delivery_method"] ?? "";
    $price_pcs = $_POST["itemPrice"] ?? "";
    foreach ($productsArray as $product) {
        if ($product['name'] === $chosenItem) {
            $price_pcs = $product['price'];
            break;
        }
    }

    $subtotal = $amount * $price_pcs;
    $deliveryCost = calculateDeliveryCosts($deliveryMethod);
    $total = $subtotal + $deliveryCost;

    return [$chosenItem, $amount, $deliveryMethod, $subtotal, $deliveryCost, $total];
}

function getDefaultVariables(): array
{
    return ["", 1, "nouto", 0, 0, 0];
}

[$chosenItem, $amount, $deliveryMethod, $subtotal, $deliveryCost, $total] = getDefaultVariables();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    [$chosenItem, $amount, $deliveryMethod, $subtotal, $deliveryCost, $total] = processSubmittedData($products);
}

?>

<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <title>Tuotteet - Verkkokauppa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php include 'navigaatio.php'; ?>
    </header>
    <main>
        <h1>Tilaa tuote</h1>
        <div class="order-layout">
            <form method="post" action="tuotteet.php">
                <label for="itemInput">Tuote:</label><br>
                <select name="chosenItem" id="chosenItem">
                    <?php foreach ($products as $product): ?>
                        <?php $price = number_format($product['price'], 2, ',', ' '); ?>
                        <option value="<?= $product['name'] ?>" <?php if ($product['name'] === $chosenItem)
                              echo ' selected'; ?>>
                            <?= $product['name'] ?> (<?= $price ?>€)
                        </option>
                    <?php endforeach; ?>
                </select>

                <br><br>
                <label for="numberInput">Määrä:</label><br>
                <input type="number" id="numberInput" name="amount" min="1" value="<?= $amount ?>">

                <br><br>
                <label for="deliveryMethod">Toimitustapa:</label><br>
                <select id="deliveryMethod" name="delivery_method">
                    <option value="nouto" <?= $deliveryMethod === 'nouto' ? 'selected' : '' ?>>Nouto</option>
                    <option value="postipaketti" <?= $deliveryMethod === 'postipaketti' ? 'selected' : '' ?>>Postipaketti
                    </option>
                    <option value="kotiinkuljetus" <?= $deliveryMethod === 'kotiinkuljetus' ? 'selected' : '' ?>>
                        Kotiinkuljetus
                    </option>
                </select>
                <br>

                <br>
                <button type="submit">Laske hinta</button>
                <br>
            </form>

            <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                <div class="summary-box">
                    <h2>Tilauksen yhteenveto</h2>
                    <p>Määrä: <?= $amount ?> kpl</p>
                    <p>Välisumma: <?= number_format($subtotal, 2, ',', ' ') ?> €</p>
                    <p>Toimitustapa: <?= ucfirst($deliveryMethod) ?></p>
                    <p>Toimituskulut: <?= number_format($deliveryCost, 2, ',', ' ') ?> €</p>
                    <h3>Yhteensä: <?= number_format($total, 2, ',', ' ') ?> €</h3>

                    <form action="lahetys.php" method="post">
                        <p>Nimi: <br>
                            <input type="text" name="nimi">
                        </p>
                        <p>Sähköposti: <br>
                            <input type="text" name="email">
                        </p>
                        <p>Lisäinfo kuljettajallemme: <br>
                            <textarea name="viesti"></textarea>
                        </p>
                        <p><input type="submit" value="Tilaa"></p>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>