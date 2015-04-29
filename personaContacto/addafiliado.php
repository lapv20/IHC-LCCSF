<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>Añadir afiliado</title>

<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
<script src="jQueryAssets/i18n/jquery.ui.datepicker-es.js" type="text/javascript"></script>
</head>

<body>
  <div class="widget">
    <h4 class="widgettitle">Actualizar Afiliados</h4>
    <div class="widgetcontent nopadding">
      <form class="stdform stdform2" action="subirarchivo.php" method="post" enctype="multipart/form-data" >
        <p>
          <label>Ubicación del Archivo
            <small>Ubique el archivo .xls donde se encuentran los usuarios</small>
          </label>
          <span class="field">
            <input class="input-xxlarge" type="file" name="archivo" id="archivo" />
          </span>
        </p>
        <!-- Subir Archivo:  <input name="userfile" type="file" /> -->
        <p class="stdformbutton"><button class="btn btn-primary" type="submit"/><span class="iconfa-file"></span> Enviar Archivo</button></p>
      </form>
</body>
</html>

<?php
/*if ($_FILES['archivo']["error"] > 0){
    echo "Error: " . $_FILES['archivo']['error'] . "<br>";
  }else{
    echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
    echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
    echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
    echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];
  }*/
?>