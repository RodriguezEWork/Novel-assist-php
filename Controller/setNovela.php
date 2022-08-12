<?php

header('Content-Type: text/html; charset=utf-8');
require_once 'ClassConnection.php';

$db = new DBConnection;
$conn = $db->conn;

if (isset($_FILES['linkImage'])) {
    $nombreImg = $_FILES['linkImage']['name'];
    $ruta      = $_FILES['linkImage']['tmp_name'];
    $destino   = "../img/" . $nombreImg;
    $direccion = "img/" . $nombreImg;
    move_uploaded_file($ruta, $destino);
}

$conn->query("SET NAMES utf8");
$query = "INSERT INTO novelas (titulo,  slug, linkImage, descripcion)  VALUES ('" . $_POST['titulo'] . "', '" . $_POST['slug'] . "', '" . $direccion . "', '" . utf8_encode($_POST['descripcion']) . "')";
$resultado = $conn->query($query);

header("location: ../index.php");
