<?php
$pages = [
    'Etusivu' => 'etusivu.php',
    'Tilaa tuote' => 'tuotteet.php',
    'Yhteystiedot' => 'yhteystiedot.php'
];
// Haetaan nykyisen sivun tiedostonimi
$active_page = basename($_SERVER['PHP_SELF']);
?>
<nav>
    <ul>
        <?php //Käydään sivut läpi foreach-lauseella. Asetetaan nykyisen sivun li-elementille class="active". Muodostetaan href-linkit silmukassa. 
        foreach ($pages as $name => $url): ?>
            <li class="<?php if ($active_page == $url)
                echo 'active'; ?>">
                <a href="<?php echo $url; ?>"><?php echo $name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>