<?php

$conn = new mysqli('localhost','root','','consultoria');

if ($conn->connect_error) {
	echo $error = $conn->connect_error;
}
?>