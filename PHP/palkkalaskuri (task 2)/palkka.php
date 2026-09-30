<?php
$tuntipalkka = $_POST["tuntipalkka"] ?? 0;
$tuntimaara = $_POST["tuntimaara"] ?? 0;
$viikonloppulisa = $_POST["viikonloppulisa"] ?? 0;
$viikonloppujenmaara = $_POST["viikonloppujenmaara"] ?? 0;

$yhteispalkka = $tuntipalkka * $tuntimaara;
$yhteispalkkalisilla = $viikonloppulisa * $viikonloppujenmaara + $yhteispalkka;

echo "Yhteispalkka ilman viikonloppulisiä: " . $yhteispalkka . "<br>";
echo "Yhteispalkka viikonloppulisien kanssa: " . $yhteispalkkalisilla;

//Add the fields weekend allowance  and number of weekends to the form that the user is asked to fill in , and modify the php code so that the 
//application prints the following information when the Send button is pressed:

//Total salary without weekend bonuses: amount
//Total salary with weekend bonuses: amount
//Test functionality on the server.
//Commit and push the changes to Github.
//Mark the task as returned.
?>