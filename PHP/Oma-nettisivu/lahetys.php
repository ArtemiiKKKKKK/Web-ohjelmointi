<?php
$nimi = (string) $_POST["nimi"] ?? "";
$viesti = (string) $_POST["viesti"] ?? "";
$email = (string) $_POST["email"] ?? "";

$ok = mail($email,
           "Palaute tilauksestasi",
           "Hyvä $nimi!\nTilauksesi oli saavutettu. Henkilökuntamme ottaa yhteyttä sinuun lähiaikoina.\n\nKuljetajalle: $viesti\n\nYstävällisin terveisin,\nKemppi Oyj");
if ($ok) {
    header("Location: kiitos.php");
} else {
    header("Location: virhe.php");
}
?>