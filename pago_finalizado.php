<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/5.0.0/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="css/paypal.css">
  </head>
  <body>
      <div class="formulario">
            <?php

                $resultado = $_GET['exito'];
                $id = $_GET['id'];

                if($resultado == "true") {

                      $fecha = date('Y-m-d');

                      $paymentId = $_GET['paymentId'];


                   try {

                    require_once('./conexionNP.php');

                    $sql = "UPDATE pagos 
                    SET fecha = '{$fecha}', 
                    pagado = 2 
                    WHERE id = {$id} ";

                    } catch (Exception $e) {
                    $error = $e->getMessage();
                    }

                    if (mysqli_query($conn, $sql)){
                          echo '<h2>';
                          echo "Pago realizado correctamente";
                          echo '<h2>';
                          echo '<br>';
                          echo '<a href="usuario.php">';
                          echo 'Volver';
                          echo '</a>';
                      }
                      else
                      {
                        echo 'Houston tenemos problemas';
                      }


                } else if($resultado == "false") {

                 header('location: ./usuario.php');
                }
            
             ?>
        </div>
  </body>
  
  
</html>