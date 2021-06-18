<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}
try {
  require_once('./conexionNP.php');
  $sql = "SELECT * FROM usuarios WHERE id = '".$id."'";
  $resultado = $conn->query($sql);

} catch (Exception $e) {
  $error = $e->getMessage();
}
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
        Home > Login >  <a class="bread" href="./registrosNespa.php">Admin</a> > Editar Usuario</label>
    </div>
  </div>
</header>

<div class="contenedor clearfix">
 
    <section class="seccion contenedor">

      <h2 class="titulo">Editar usuario</h2>
       <?php while($registros = $resultado->fetch_assoc() ) { ?>
      <form id="registro" class="registro" action="editar.php" 
      method="get">

      <aside class="alinear clearfix">
        <div id="datos_usuario" class="registro caja clearfix">
          <div class="campo">
            <label class="datos" for="nombre">Nombre:</label>
            <input type="text" id="nombre" class="caja" 
            name="nombre" value="<?php echo $registros['nombre']; ?>" required>
          </div>
          <div class="campo">
            <label class="datos" for="apellido">Apellido:</label>
            <input type="text" id="apellido" class="caja" 
            name="apellido" value="<?php echo $registros['apellido']; ?>" required>
          </div>
          <div class="campo">
            <label class="datos" for="email">Email:</label>
            <input type="email" id="email" class="caja" 
            name="email" value="<?php echo $registros['email']; ?>" required>
          </div>
          <div class="campo">
            <label class="datos" for="telefono">Telefono:</label>
            <input type="text" id="telefono" class="caja" 
            name="telefono" value="<?php echo $registros['telefono']; ?>" required>
          </div>
          <div class="campo">
            <label class="datos" for="colonia">Colonia:</label>
            <input type="text" id="colonia" class="caja" 
            name="colonia" value="<?php echo $registros['colonia']; ?>" required>
          </div>
          <div class="campo">
            <label class="datos" for="municipio">Municipio:</label>
            <input type="text" id="municipio" class="caja"
            name="municipio" value="<?php echo $registros['municipio']; ?>" required>
          </div>
          <div class="campo">
            <label class="datos" for="estado">Estado:</label>
            <input type="text" id="estado" class="caja"
            name="estado" value="<?php echo $registros['Estado']; ?>" required>
          </div>

        </div>
       </aside>

        <div id="error"></div>
        <input type="hidden" name="id" value="<?php echo $registros['id']; ?>">
        <input type="submit" id="calcular" class="button" 
        value="Modificar" onclick="vacios()">
        <?php } ?>
      </form>

    </section>

  
</div><!--contenedor-->

     <?php 
    $conn->close();
     ?>

</body>

</html>