<?php 

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
  $id = $_GET['id'];
}

 try {
  require_once('./conexionNP.php');

  $sql = "UPDATE pagos 
  SET descripcion = '{$descripcion}',
  cantidad = '{$costo}', 
  fecha = '{$fecha}'
  WHERE id = {$id} ";

} catch (Exception $e) {
  $error = $e->getMessage();
}

if (mysqli_query($conn, $sql)){

  $sqli = "SELECT cliente FROM pagos
  WHERE id = {$id} ";
  $nombre = $conn->query($sqli);
  $id_cliente = mysqli_fetch_array($nombre);
 
 header('location: ./revisar.php?id='.$id_cliente['0'].'');

}else{
  echo 'Houston tenemos problemas';
}
	$conn->close();
	 ?>