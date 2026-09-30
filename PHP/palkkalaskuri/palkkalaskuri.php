<!DOCTYPE html>
<html>

<head>
    <title>Palkkalaskuri</title>
</head>

<body>
    <form action="palkka.php" method="post">
        Tuntipalkka: <input type="text" name="tuntipalkka"> <br>
        Tuntimäärä: <input type="text" name="tuntimaara"> <br>
        Viikonloppulisä: <input type="text" name="viikonloppulisa"> <br>
        Viikonloppujen määrä: <input type="text" name="viikonloppujenmaara"> <br>
        <input type="submit" value="Lähetä">
    </form>
</body>

</html>
<!--
Add the fields weekend allowance  and number of weekends to the form that the user is asked to fill in ,
and modify the php code so that the application prints the following information when the Send button is pressed: 
-->

<!-- 
Total salary without weekend bonuses: amount
Total salary with weekend bonuses: amount
Test functionality on the server. 
Commit and push the changes to Github. 
Mark the task as returned. 
-->