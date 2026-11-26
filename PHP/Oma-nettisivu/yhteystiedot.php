<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <title>Yhteystiedot - Verkkokauppa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php include 'navigaatio.php'; ?>

    </header>
    <main>
        <h1>Yhteystiedot: </h1>
        <p>
            Kauhajoen toimipiste: 046 55562323332
            <button type="button" onclick="copy('046 55562323332')"
                style="padding: 2px 6px; font-size: 0.8em;">Kopioida</button>
            <span id="msg"></span>
        </p>

        <script>
            let timer;
            function copy(val) {
                navigator.clipboard?.writeText(val).catch(() => { });
                const el = document.getElementById("msg");
                el.textContent = " Kopioitu!";
                clearTimeout(timer);
                timer = setTimeout(() => el.textContent = "", 2000);
            }
        </script>
    </main>
</body>

</html>