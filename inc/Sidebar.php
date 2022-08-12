<?php

$capitulos = $conn->query("SELECT * from capitulos WHERE id_Novelas = '58'");
$rows = $capitulos->fetch_all(MYSQLI_ASSOC);

?>

<h1>Opciones</h1>
<div class="playlist">
    <h4>
        <i class="fa fa-microphone" aria-hidden="true"></i>   Elegir Idioma
    </h4>
    <select name="voz" id="voz">
        <option value="es-AR" selected>Español - Argentina</option>
        <option value="es-ES">Español - España</option>
        <option value="es-MX">Español - Mexico</option>
        <option value="en-PH">Ingles - Estados Unidos</option>
        <option value="en-CA">Ingles - Canada</option>
        <option value="en-AU">Ingles - Australia</option>
        <option value="fr-FR">Frances - Francia</option>
        <option value="it-IT">Italiano - Italia</option>
        <option value="ja-JP">Japones - Japon</option>
        <option value="ru-RU">Ruso - Rusia</option>
    </select>
    <h4><i class="fa fa-bolt" aria-hidden="true"></i>   Velocidad</h4>
    <input type="range" name="volumen" id="volumen" value="1" min="0.1" max="1" step="0.1" />
</div>
<div class="master-play">
    <div class="wave">
        <div class="wave1"></div>
        <div class="wave1"></div>
        <div class="wave1"></div>
        <div class="wave1"></div>
    </div>
    <img src="https://i.stack.imgur.com/cjXKj.png" alt="" id="imagen-wave" />
    <h5>
        <span id="titulo-wave"></span>
        <div class="subtitle" id="registro"></div>
    </h5>
    <div class="icon">
        <i class="bi bi-pause-fill"></i>
        <i class="bi bi-play-fill"></i>
        <i class="bi bi-stop-fill"></i>
    </div>
</div>
<div class="menu-song" id="lista"></div>