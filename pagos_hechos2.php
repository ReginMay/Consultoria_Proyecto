<?php

  session_start();
  include_once './funciones.php';
  usuario_autenticado();


 try {
  require_once('./conexionNP.php');

  if (isset($_GET['id'])) {
  $id = $_GET['id'];
  }

  $sql = "SELECT * FROM pagos
  where cliente = {$id} and pagado = 2";
  $resultado = $conn->query($sql);

  $sql2 = "SELECT nombre FROM usuarios
  where id = {$id}";
  $nombre = $conn->query($sql2);
  $nombreComp = mysqli_fetch_array($nombre);

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
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/usuarios.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>

<header class="site-header">
  <div class="hero">
    <div class="content-header">
      <a href="./registrosNespa.php">
      <img class="logo" src="img/Newlogo.jpg">
      </a>
      <a class="lateral" type="button" href="registrosNespa.php">Regresar</a>
    <a class="lateral" type="button" href="revisar.php?id=<?php echo $id;?>">Pagos Pendientes</a>
    <a class="lateral" type="button" href="">Pagos Realizados</a>
    </div>
  </div>
</header>

<div class="contenedor clearfix">


    <aside class="imagen parallax">
  </aside>
  <br>
<label>Home > Login > Admin > Revisar > Pagos Realizados</label>
    <section class="text">
  
  <p class="title">Pagos Realizados de <?php echo $nombreComp['0'];  ?></p>


   <table>
              <thead>
                <tr>
                 <th>Descripción del servicio</th>
                 <th>Cantidad pagada</th>
                 <th>Fecha en que se realizo el pago</th>
                 </tr>
              </thead>

              <tbody>
                
                <?php while($registros = $resultado->fetch_assoc() ) { ?>
                 <tr>
                   <td><?php echo $registros['descripcion']; ?></td>
                   <td><?php echo '$ '.$registros['cantidad']; ?></td>
                   <td><?php echo $registros['fecha']; ?></td>
                 </tr>
                <?php } ?>
              </tbody>
            </table>

  </section>
</div><!--contenedor-->



<section class="class">
  
</section>


  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>


  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>


</body>

</html>