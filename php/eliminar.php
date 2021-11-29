<?php 
	include("db_connection.php");

if (isset($_GET['id'])) {
	$id_person = $_GET['id'];
	$sql = "DELETE FROM personas WHERE id_person = $id_person";
	$resultado = mysqli_query($con, $sql);

	if (!$resultado){
		die("error en la consulta eliminar");
	}
	$_SESSION['message'] = '¡Datos Eliminados!';
	$_SESSION['message_type'] = 'danger';

	header("location: ../index.php");
}

?>