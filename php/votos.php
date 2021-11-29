 
<?php 

	include('db_connection.php');

	global $con;

	if (isset($_POST['id_usuario'])) {
		echo "aca entra";
	//capturar variablas por metodo POST
		//$id_person = $_GET['id'];
		$id_usuario = $_POST['id_usuario'];
		$name_user = $_POST['name_user'];	
		$last_user = $_POST['last_user'];
		$voto = $_POST['id_person'];

		//echo "<br>", $id_person, "<br>";
		echo "<br>";

		echo $id_usuario, "<br>";
		echo $name_user, "<br>";
		echo $last_user, "<br>";
		echo $voto, "<br>";

		//Insertar datos del elector
		$sql = "INSERT INTO votos(id_usuario, name_user, last_user, voto ) 
						VALUES ('$id_usuario', '$name_user', '$last_user', '$voto')";
		//$resultado = mysqli_query($con, $sql);
		$result = mysqli_query($con, $sql);
		if($result){
			$_SESSION['message'] = '¡Candidato elejodo!';
			$_SESSION['message_type'] = 'success';
			
		}elseif (!$result) {
			$_SESSION['message'] = '¡Ya has elejido un candidato!';
			$_SESSION['message_type'] = 'danger';
		}
		header("location: ../elecciones.php");
	}
?>