<?php 

function revisar_usuario(){
	return isset($_SESSION['usuario']);
}

function usuario_autenticado(){
  if (!revisar_usuario()):
  header('./login.php');
  endif;
}



 ?>