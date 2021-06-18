<?php 

if (isset($_POST['nombre'])) {
	$nombre = $_POST['nombre'];
}
if (isset($_POST['apellido'])) {
	$apellido = $_POST['apellido'];
}
if (isset($_POST['email'])) {
	$email = $_POST['email'];
}
if (isset($_POST['telefono'])) {
	$telefono = $_POST['telefono'];
}
if (isset($_POST['colonia'])) {
	$colonia = $_POST['colonia'];
}
if (isset($_POST['municipio'])) {
	$municipio = $_POST['municipio'];
}
if (isset($_POST['estado'])) {
  $Estado = $_POST['estado'];
}

 try {
  require_once('./conexionNP.php');
  $sql = "INSERT INTO usuarios (id,nombre,apellido,email,telefono,colonia,municipio,Estado)";
  $sql.='VALUES (NULL,"'.$nombre.'","'.$apellido.'","'.$email.'","'.$telefono.'","'.$colonia.'","'.$municipio.'","'.$Estado.'")';

} catch (Exception $e) {
  $error = $e->getMessage();
}

if (mysqli_query($conn, $sql)){

	$sql2 = "SELECT id FROM usuarios
  	where nombre = '{$nombre}' and
 	apellido = '{$apellido}' and 
 	email = '{$email}' and 
  	telefono = '{$telefono}' and
 	colonia = '{$colonia}' and
  	municipio = '{$municipio}' and
  	Estado = '{$Estado}' ";

  	if (mysqli_query($conn, $sql2)){

  		$resultado = $conn->query($sql2);
  		$id = mysqli_fetch_array($resultado);

  header('location: ./crear_usuario.php?id='.$id['0'].'');
}else{
	echo "Error en la consulta";
}


}
else
{
  echo 'Houston tenemos problemas';
}
	$conn->close();
	 ?>