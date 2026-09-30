<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($username === "admin" && $password === "cat123") {
        echo '<meta charset="utf-8">';
        echo "<h1>Tervetuloa admin!</h1>";
        echo "<p>Sinut ohjataan palkkalaskuriin muutaman sekunnin kuluttua...</p>";
        echo '<meta http-equiv="refresh" content="2;url=palkkalaskuri.php">';
        exit();
    } else {
        echo "Väärä käyttäjätunnus tai salasana.";
    }
}
?>