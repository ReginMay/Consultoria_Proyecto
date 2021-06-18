<?php 

session_start();
include_once './funciones.php';
usuario_autenticado();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  }

 try {
  require_once('./conexionNP.php');

  $sqlu = "SELECT * FROM pagos
  WHERE id = '{$id}'";
  $consulta = $conn->query($sqlu);

} catch (Exception $e) {
  $error = $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/5.0.0/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/paypal.css">
    <script src="js/alerta.js"></script>
  </head>
  <body>
      <div class="formulario">
        <label> Home > Login > <a class="regresar" href="usuario.php">Cliente: Pagos pendientes</a> > Pagar Paypal</label>
            <h2>Pagar en Paypal</h2>
            <h4>Verifique sus datos</h4>

            <?php while($registros = $consulta->fetch_assoc() ) { ?>
              <form action="pagar.php?id=<?php echo $registros['id']; ?>" method="post">
                    <div class="campo">
                      <label for="producto">Servicio</label>
                      <input id="producto" value="<?php echo $registros['descripcion']; ?>" type="text" name="producto" placeholder="Especificar el servicio que se realizo" required>
                    </div>
                      
                    <div class="campo">
                      <label for="precio">Cantidad</label>
                      <input id="precio" value="<?php echo $registros['cantidad']; ?>" type="number" name="precio" placeholder="Cantidad a pagar" min="0" required>
                    </div>
                    
                    <input type="submit" name="submit" id="Pagar" value="Pagar" class="button" onclick="vacios3()">

                    <?php } ?>
              </form>
              <?php 
    $conn->close();
     ?>
        </div>
  </body>
</html>