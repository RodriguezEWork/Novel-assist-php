<?php

$Novelas = $conn->query("SELECT * from novelas ORDER BY id DESC");
$rows = $Novelas->fetch_all(MYSQLI_ASSOC);

?>

<div class="content">

    <?php
    foreach ($rows as $fila) {
        echo '<div class="carta">';
        echo '<p style="display: none">' . $fila['id'] . '</p>';
        echo '<img 
        src="' . $fila['linkImage'] . '" 
        alt="S' . $fila['titulo'] . '" 
        class="Portada-Novel" />';
        echo '<h4 id="Titulo-novela" class="Titulo-Novel">' . utf8_encode($fila['titulo']) . '</h4>';
        echo '</div>';
    }
    ?>

</div>