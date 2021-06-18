<?php

  session_start();
  include_once './funciones.php';
  usuario_autenticado();


 try {
  require_once('./conexionNP.php');

  $usuario =  $_SESSION['usuario'];

  $sqlu = "SELECT persona FROM admins
  WHERE usuario = '{$usuario}'";
  $consulta = $conn->query($sqlu);
  $id = mysqli_fetch_array($consulta);



  $sql = "SELECT * FROM pagos
  where cliente = {$id['0']} and pagado = 1";
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
      <a href="./usuario.php">
      <img class="logo" src="img/Newlogo.jpg">
      </a>
      <a class="lateral" type="button" href="session_close.php">Cerrar Sesión</a>
    <a class="lateral" type="button" href="#">Pagos Pendientes</a>
    <a class="lateral" type="button" href="pagos_hechos.php">Pagos Realizados</a>
    </div>
  </div>
</header>

<div class="contenedor clearfix">
    <aside class="imagen parallax">
  </aside>
  <br>
  <label> Home > Login > Cliente: Pagos Pendientes</label>
    <section class="text">
  
  <p class="title">Pagos Pendientes de <?php echo $_SESSION['usuario'];  ?></p>


   <table>
              <thead>
                <tr>
                 <th>Descripción del servicio:</th>
                 <th>Cantidad a pagar:</th>
                 <th>Pagar antes del:</th>
                 </tr>
              </thead>

              <tbody>
                
                <?php while($registros = $resultado->fetch_assoc() ) { ?>
                 <tr>
                   <td><?php echo $registros['descripcion']; ?></td>
                   <td><?php echo '$ '.$registros['cantidad']; ?></td>
                   <td><?php echo $registros['fecha']; ?></td>
                   <td>
                     <a class="button" type="button" href="paypal.php?id=<?php echo $registros['id'];?>">&ensp;PAGAR&ensp;</a>
                   </td>
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