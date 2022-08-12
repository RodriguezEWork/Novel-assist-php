<?php

header('Content-Type: text/html; charset=utf-8');

require_once 'ClassConnection.php';

$db = new DBConnection;
$conn = $db->conn;

$capitulos = $conn->query("SELECT * from capitulos WHERE id_Novelas = '" . $_POST['id'] . "'");
$rows = $capitulos->fetch_all(MYSQLI_ASSOC);

foreach ($rows as $fila) {
    echo '<li class="songItem">';
    echo '<span class="numero-cap">' . $fila['numero'] . '</span>';
    echo '<h5><span class="titulo">' . $fila['titulo'] .
        '</span><br />
    <div class="subtitle">';
    if ($fila['marcado'] == 1) {
        echo 'Visto';
    } else {
        echo 'Pendiente';
    };
    echo '</div></h5>';
    echo '<p style="display: none" class="id_novela">' . $fila['id_Novelas'] . '</p>';
    echo '<p style="display: none" class="id">' . $fila['id'] . '</p>';
    echo '<p style="display: none" class="capitulo">' . utf8_encode($fila['capitulo']) . '</p>';
    echo '<i class="bi bi-play-circle-fill"></i>';
    echo '</li>';
}
