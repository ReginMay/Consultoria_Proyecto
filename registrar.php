<?php
include 'conexionNp.php'; 

?>

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Alvarado y Nespa</title>
  <meta name="description" content="">

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/registrar.css">
  <script src="js/alerta.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Vollkorn&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cantata+One&display=swap" rel="stylesheet">

  <meta name="theme-color" content="#fafafa">
</head>

<body class="fondo">

<header class="site-header">
  <div class="hero">
    <div class="content-header">
      <a href="registrosNespa.php">
      <img class="logo" src="img/Newlogo.jpg">
      </a>
      <label class="bread">
        Home > Login >  <a class="bread" href="./registrosNespa.php">Admin</a> > Agregar Usuario</label>
    </div>
  </div>
</header>

<div class="contenedor clearfix">
 
    <section class="seccion contenedor">

      <h2 class="titulo">Registro de usuarios</h2>
      <form id="registro" class="registro" action="registrarNp.php" 
      method="post">

      <aside class="alinear clearfix">
        <div id="datos_usuario" class="registro caja clearfix">
          <div class="campo">
            <label class="datos" for="nombre">Nombre:</label>
            <input type="text" id="nombre" class="caja" 
            name="nombre" placeholder="Nombre" required>
          </div>
          <div class="campo">
            <label class="datos" for="apellido">Apellido:</label>
            <input type="text" id="apellido" class="caja" 
            name="apellido" placeholder="Apellido" required>
          </div>
          <div class="campo">
            <label class="datos" for="email">Email:</label>
            <input type="email" id="email" class="caja" 
            name="email" placeholder="@Email" required>
          </div>
          <div class="campo">
            <label class="datos" for="telefono">Telefono:</label>
            <input type="text" id="telefono" class="caja" 
            name="telefono" placeholder="Telefono" required>
          </div>
          <div class="campo">
            <label class="datos" for="colonia">Colonia:</label>
            <input type="text" id="colonia" class="caja" 
            name="colonia" placeholder="Colonia" required>
          </div>
          <div class="campo">
            <label class="datos" for="municipio">Municipio:</label>
            <input type="text" id="municipio" class="caja"
            name="municipio" placeholder="Municipio" required>
          </div>
          <div class="campo">
            <label class="datos" for="estado">Estado:</label>
            <input type="text" id="estado" class="caja"
            name="estado" placeholder="Estado" required>
          </div>

        </div>
       </aside>

        <div id="error"></div>
        <input type="submit" name="submit" id="calcular" class="button" 
        value="Registrar" onclick="vacios()">

      </form>
    </section>

    <?php 
    $conn->close();
     ?>

  
</div><!--contenedor-->


</body>

</html>