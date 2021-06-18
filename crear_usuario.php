<?php

  session_start();
  include_once './funciones.php';
  usuario_autenticado();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

 try {
  require_once('./conexionNP.php');
  $sql = "SELECT concat_ws(' ', nombre, apellido) FROM usuarios
  where id = {$id}";
  $resultado = $conn->query($sql);
  $nombreComp = mysqli_fetch_array($resultado);

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

  <script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
    <script src="js/alerta.js"></script>

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/logi.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body class="logi2">

<header class="site-header">
  <div class="hero">
    <div class="content-header">
      <p class="hello">Home > login > Admin > Agregar > Nuevo Usuario</p>
    </div>
  </div>
</header>

<div class="contenedor conte2 clearfix">
  <div class="content conten2 clearfix">
    <section class="text2 set2">
  <img class="mage" src="img/Logo2.jpg">
  <p class="title clear">Nuevo Usuario</p>
  <div class="sesion">
<form action="crear_usuario.php" method="post">
    <label>Cliente:</label><br>
    <input class="block peq" type="text" readonly="readonly" name="id" value="<?php echo $id ?>">
    <input class="block" type="text" readonly="readonly" name="cliente" value="<?php echo $nombreComp['0']; ?>"><br>
    <label>Usuario:</label><br>
    <input type="text" name="usuario" id="usuario" required><br>
    <label>Contraseña:</label><br>
    <input type="password" name="contraseña" id="contrasena" required><br>
    <label>Cliente o Administrador:</label><br>
    <select name="admin" id="option">
    <option value=1>Aministrador</option>
    <option value=2>Cliente</option>
    </select>
  </fieldset>
</div>
  <br>
  <button type="submit" name="submit" class="login2" onclick="camposvacios()">Registrar</button>
</form>
</section>
    </div><!--content-->

<?php 

if (isset($_POST['submit'])):
  $usuario = $_POST['usuario'];
  $contraseña = $_POST['contraseña'];
  $admin = $_POST['admin'];
  $id = $_POST['id'];

  if (strlen($usuario)<5):
    echo "<div class='alert_error'>";
    echo "Hubo un error usuario duplicado";
    echo "</div>";
  endif;

  $opciones = array(
    'cost' => 12,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
  );

  $hashed_password = password_hash($contraseña, PASSWORD_BCRYPT, $opciones);

 /* echo $hashed_password;*/


  try {
  require_once('./conexionNP.php');
  
  $stmt = $conn->prepare("INSERT INTO admins (usuario, password, admin, persona) VALUES (?,?,?,?)");
  $stmt->bind_param("ssss", $usuario, $hashed_password, $admin, $id);
  $stmt->execute();

  if ($stmt->error):
  echo "<div class='alert_error'>";
  echo "Hubo un error usuario duplicado";
  echo "</div>";
  else:
 /* echo "<div class='mensaje'>";
  echo "Se insertó correctamente el usuario";
  echo "</div>";*/
  echo '<script>window.location="./registrosNespa.php"</script>';
  endif;

  $stmt->close();
  $conn->close();


} catch (Exception $e) {
  $error = $e->getMessage();
}


endif;
?>

</div><!--contenedor-->

<br>




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