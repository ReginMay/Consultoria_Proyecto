<?php
include 'conexionNp.php'; 

if (isset($_POST['submit'])):

  if (isset($_POST['descripcion'])) {
  $descripcion = $_POST['descripcion'];
}
if (isset($_POST['costo'])) {
  $costo = $_POST['costo'];
}
if (isset($_POST['fecha'])) {
  $fecha = $_POST['fecha'];
}
if (isset($_GET['id'])) {
  $id_cliente = $_GET['id'];
  }
        require_once('./conexionNP.php');
        $sqli = 'SELECT NOW()';  
        $resultado = $conn->query($sqli);
        $row = mysqli_fetch_array($resultado);

if ($fecha > $row['0']) {
          
 try {
  require_once('./conexionNP.php');
  $sql = "INSERT INTO pagos (id,descripcion,cantidad,fecha,cliente,pagado)";
  $sql.='VALUES (NULL,"'.$descripcion.'","'.$costo.'","'.$fecha.'","'.$id_cliente.'",1)';

} catch (Exception $e) {
  $error = $e->getMessage();
}

if (mysqli_query($conn, $sql)){

  header('location: ./revisar.php?id='.$id_cliente.'');
}else{
  echo 'Houston tenemos problemas';
}

}else{

  ?>
  <script type="text/javascript">
  window.alert("Fecha Incorrecta");
  </script>
  <?php

// header('location: ./agregar.php?id='.$id_cliente.'');

?>
  <script type="text/javascript">
   

  </script>
  <?php
}

endif;
///////
if (isset($_GET['id'])) {
  $id_cliente = $_GET['id'];
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
      <a class="lateral" type="button" href="revisar.php?id=<?php echo $id_cliente;?>">Regresar</a>
    </div>
  </div>
</header>

<div class="contenedor clearfix">
  <br>
  <label>Home > Login > <a href="registrosNespa.php"> Admin</a> > Revisar > <a href="revisar.php?id=<?php echo $id_cliente;?>">Pagos Pendientes </a> > Nuevo adeudo</label>
    <section class="seccion contenedor">

      <h2 class="titulo">Agregar nuevo adeudo</h2>
      <form id="registro" class="registro" action="agregar.php?id=<?php echo $id_cliente;?>" method="post">

      <aside class="alinear2 clearfix">
        <div id="datos_usuario" class="registro caja clearfix">
          <div class="campo">
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" class="caja" 
            name="descripcion" placeholder="Descripcion del servicio realizado" required>
          </div>
          <div class="campo">
            <label for="costo">Costo:</label>
            <input type="text" id="costo" class="caja" 
            name="costo" placeholder="Precio del adeudo" required>
          </div>
          <div class="campo">
            <label for="fecha">Fecha a pagar:</label>
            <input type="date" id="fecha" class="caja" 
            name="fecha" placeholder="Fecha recomendada a pagar" required>
          </div>

        </div>
       </aside>

        <div id="error"></div>
        <input type="submit" name="submit" id="calcular" class="button" 
        value="Agregrar" onclick="vacios2()">

      </form>
      <br>
      <?php
/*
  if ($validar == true) {
    ?>
  <?php
 echo "<div class='alert_error med'>";
  echo "Facha incorretcta";
  echo "</div>";
  }*/
  
?>

    </section>

    <?php 
    $conn->close();
     ?>

  
</div><!--contenedor-->


</body>

</html>