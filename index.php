<?php

require_once 'Controller/ClassConnection.php';

$db = new DBConnection;
$conn = $db->conn;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link content rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/form-modal.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- Bootstrap Icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <!-- Bootstrap Icons -->

    <link rel="stylesheet" href="/css/font-awesome.css" />
    <title>Document</title>
</head>

<body>
    <header>
        <div class="menu-side">
            <?php include_once 'inc/Sidebar.php'; ?>
        </div>
        <div class="song-side">
            <?php include_once 'inc/formNovel.php'; ?>
            <?php include_once 'inc/formCapitulo.php'; ?>
            <?php include_once 'inc/TopNav.php'; ?>
            <?php include_once 'inc/Cartas.php'; ?>
        </div>
    </header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/js/app.js"></script>
</body>

</html>