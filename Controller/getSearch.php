<?php

header('Content-Type: text/html; charset=utf-8');

require_once 'ClassConnection.php';

$db = new DBConnection;
$conn = $db->conn;

$capitulos = $conn->query("SELECT * from novelas WHERE titulo LIKE '%" . $_POST['id'] . "%'");
$rows = $capitulos->fetch_all(MYSQLI_ASSOC);

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
