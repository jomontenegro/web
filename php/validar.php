<?php
include ('db_connection.php'); 	

if (isset($_POST['usu_admin'])){
	
	$usu_admin = $_POST['usu_admin'];
	$pass_admin =$_POST['password'];
	//echo $usu_admin, $pass_admin ;

	$sql = "SELECT * FROM usersadmin WHERE usu_admin = '$usu_admin' and pass_admin = '$pass_admin'";
	$resultado = mysqli_query($con, $sql);

	$filas=mysqli_num_rows($resultado);
	echo $filas;
	//echo $usu_admin;
	$usu_admin = $_POST['usu_admin'];

	if ($filas === 0) {
		$_SESSION['message'] = '¡Credenciales Incorrectas!';
		$_SESSION['message_type'] = 'danger';
		echo "Error al iniciar session";
		//echo $filas;
		//echo $usu_admin;
		//echo $pass_admin;
		header("location: login.php");
	}elseif($filas === 1){
		$_SESSION['message'] = '¡Bienvenido <?php echo $usu_admin;?>!';
		$_SESSION['message_type'] = 'success';
		//echo "session iniada";
		//echo $usu_admin;
		//echo $pass_admin;
		header("location: ../index.php");
	}
	

	//$_SESSION['message'] = '¡Datos Eliminados!';
	//$_SESSION['message_type'] = 'danger';

	//header("location: ../index.php");
}
?>
