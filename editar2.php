<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  }

try {
  require_once('./conexionNP.php');
  $sql = "SELECT * FROM pagos WHERE id = '".$id."'";
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
      <a class="lateral" type="button" href="registrosNespa.php">Regresar</a>
    </div>
  </div>
</header>

<div class="contenedor clearfix">
  <br>
 <label>Home > Login > Admin > Revisar > Pagos Pendientes > Editar adeudo</label>

    <section class="seccion contenedor">

      <h2 class="titulo">Editar el adeudo</h2>
      <?php while($registros = $resultado->fetch_assoc() ) { ?>
      <form id="registro" class="registro" action="editarNp.php?id=<?php echo $id;?>" 
      method="post">

      <aside class="alinear2 clearfix">
        <div id="datos_usuario" class="registro caja clearfix">
          <div class="campo">
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" class="caja" 
            name="descripcion" value="<?php echo $registros['descripcion']; ?>" required>
          </div>
          <div class="campo">
            <label for="costo">Costo:</label>
            <input type="text" id="costo" class="caja" 
            name="costo" value="<?php echo $registros['cantidad']; ?>" required>
          </div>
          <div class="campo">
            <label for="fecha">Fecha  a pagar:</label>
            <input type="date" id="fecha" class="caja" 
            name="fecha" value="<?php echo $registros['fecha']; ?>" required>
          </div>

        </div>
       </aside>

        <div id="error"></div>
        <input type="submit" id="calcular" class="button" 
        value="Editar" onclick="vacios2()">
        <?php } ?>
      </form>
    </section>

    <?php 
    $conn->close();
     ?>

  
</div><!--contenedor-->


</body>

</html>