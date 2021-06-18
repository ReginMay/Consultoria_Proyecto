<?php

  session_start();
   include 'funciones.php';
usuario_autenticado();


 try {
  require_once('./conexionNP.php');
  $sql = "SELECT p.id, p.nombre, p.apellido, p.email, p.telefono,
    p.colonia, p.municipio, p.Estado
    from usuarios as p, admins as a
    where p.id = a.persona and a.admin = 2";
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
  <link rel="stylesheet" href="css/tablaregistro.css">
    <script src="js/alerta.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Vollkorn&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cantata+One&display=swap" rel="stylesheet">

  <meta name="theme-color" content="#fafafa">
</head>

<body class="fondo">

<header class="site-header">
  <div class="hero">
    <div class="content-header">
      <a href="./registrosNespa.php">
      <img class="logo" src="img/Newlogo.jpg">
      </a>
      <label>
        Home > Login > Admin: <?php echo $_SESSION['usuario'];  ?></label>
      <a class="lateral" type="button" href="session_close.php">Cerrar Sesión</a>
      <a class="lateral" type="button" href="registrar.php">Agregar Usuario</a>
    </div>
  </div>
</header>

<div class="contenido clearfix">
 
    <section class="sesion contenedor">

      <h2 class="titulo">
        CLIENTES
      </h2>

 
            <table>
              <thead>
                <tr>
                 <th>Nombre completo:</th>
                 <th>Dirrección:</th>
                 <th>Contactos:</th>
                 </tr>
              </thead>

              <tbody>
                
                <?php while($registros = $resultado->fetch_assoc() ) { ?>
                 <tr>
                   <td><?php echo $registros['nombre'].' '.$registros['apellido']; ?></td>
                   <td><?php echo 'Estado: '.$registros['Estado'].'<br>'.'Municipio: '.$registros['municipio'].'<br>'.'Colonia: '.$registros['colonia']; ?></td>
                   <td><?php echo 'Telefono: '.$registros['telefono'].'<br>'.' Correo: '.$registros['email']; ?></td>
                   <td>
                     <a class="button" type="button" href="editarNespa.php?id=<?php echo $registros['id']; ?>">&ensp;EDITAR&ensp;</a>
                   </td>
                   <td>
                     <a class="button" type="button" href="revisar.php?id=<?php echo $registros['id']; ?>">&ensp;REVISAR&ensp;</a>
                   </td>
                 </tr>
                <?php } ?>
              </tbody>
            </table>
      </div>
     

</div>




    </section>
</div><!--contenedor-->


</body>

</html>