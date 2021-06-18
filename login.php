<?php 
$resultado = false;

if (isset($_POST['submit'])):
  session_start();
  $usuario = $_POST['usuario'];
  $contraseña = $_POST['contraseña'];

  try {
  require_once('./conexionNP.php');

$usu = 'SELECT * FROM admins WHERE usuario = "'.$usuario.'"';
        $usuc = $conn->query($usu);

//var_dump($conn);exit;

$row = mysqli_fetch_array($usuc);
  
  if ($row['1']==NULL) {
    ?>
  <script type="text/javascript">
  window.alert("Usuario Incorrecto");
  </script>
  <?php
  }



  $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ?; ");
  $stmt->bind_param("s", $usuario);
  $stmt->execute();
  $stmt->bind_result($id, $nombre_usuario, $password_usuario, $admin, $persona);
 while ($stmt->fetch()) {
    if (password_verify($contraseña, $password_usuario)) {
      if ($admin == 1) {
      $_SESSION['usuario'] = $usuario;
      $_SESSION['id'] = $id;
      header('location: ./registrosNespa.php');
      }else if ($admin == 2){
      $_SESSION['usuario'] = $usuario;
      $_SESSION['id'] = $id;
      header('location: ./usuario.php');
      }
        
      

    }else{
      $resultado = true;
    }

}
  $stmt->close();
  $conn->close();


} catch (Exception $e) {
  $error = $e->getMessage();
}


endif;
?>

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Alvarado y Nespa</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/logi.css">
  <script src="js/alerta.js"></script>

  <meta name="theme-color" content="#fafafa">
</head>

<body>

<header class="site-header">
  <div class="hero">
    <div class="content-header">
      <p class="hello">PAGOS ALVARADO Y NESPA</p>
    </div>
  </div>
</header>

<div class="contenedor clearfix">
  <div class="content clearfix">
    <a class="volver" href="./index.php">Home ></a>
    <a class="volver" href="">Login</a>
    <aside class="imagen">
  </aside>
    <section class="text">
  <img class="mage" src="img/Logo2.jpg">
  <p class="title log">INCIAR SESIÓN</p>
  
  <div class="sesion">
<form action="login.php" method="post">
  <label>Usuario:</label><br>
    <input type="text" name="usuario" class="let" id="usuario" required><br>
    <label>Contraseña:</label><br>
    <input type="password" name="contraseña" class="let" id="contrasena" required><br>
  </fieldset>
</div>

  <br>
  <button type="submit" name="submit" class="login" onclick="camposvacios()">Acceder</button>
</form>

</section>
    </div><!--content-->

<?php

  if ($resultado == true) {
    ?>
  <script type="text/javascript">
  window.alert("Contraseña Incorrecta");
  </script>
  <?php
  }

  
?>

</div><!--contenedor-->


<br>

<div>

</div>


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