<?php 

if (isset($_GET['nombre'])) {
	$nombre = $_GET['nombre'];
}
if (isset($_GET['apellido'])) {
	$apellido = $_GET['apellido'];
}
if (isset($_GET['email'])) {
	$email = $_GET['email'];
}
if (isset($_GET['telefono'])) {
	$telefono = $_GET['telefono'];
}
if (isset($_GET['colonia'])) {
	$colonia = $_GET['colonia'];
}
if (isset($_GET['municipio'])) {
	$municipio = $_GET['municipio'];
}
if (isset($_GET['estado'])) {
  $estado = $_GET['estado'];
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

 try {
  require_once('./conexionNP.php');

  $sql = "UPDATE usuarios 
  SET nombre = '{$nombre}',
  apellido = '{$apellido}', 
  email = '{$email}', 
  telefono = '{$telefono}',
  colonia = '{$colonia}',
  municipio = '{$municipio}',
  Estado = '{$estado}' 
  WHERE id = {$id} ";

} catch (Exception $e) {
  $error = $e->getMessage();
}

if (mysqli_query($conn, $sql)){
    header('location: ./registrosNespa.php');
}
else
{
  echo 'Houston tenemos problemas';
}

$conn->close();
?>