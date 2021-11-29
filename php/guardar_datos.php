<?php 
	include('db_connection.php');

	global $con;

	if (isset($_REQUEST['enviar'])) {
		if (isset($_FILES['imagen']['name'])) {
			$tipoArchivo = $_FILES['imagen']['type'];
			$nombreArchivo = $_FILES['imagen']['name'];
			$tamanoArchivo = $_FILES['imagen']['size'];

			$imagenSubida = fopen($_FILES['imagen']['tmp_name'], 'r');
			$binariosImagen = fread($imagenSubida, $tamanoArchivo);
			$binariosImagen = mysqli_escape_string($con, $binariosImagen);
			//$sql1 = "INSERT INTO personas(name_imagen, imagen, tipo_imagen) 
			//		VALUES('".$nombreArchivo."','".$binariosImagen."','".$tipoArchivo."')";
			//$resultado = mysqli_query($con, $sql1);
		}
		if (isset($_POST['id_person'])) {

		//capturar variablas por metodo POST
			$id_person = $_POST['id_person'];
			$name_person = $_POST['name_person'];	
			$last_person = $_POST['last_person'];

			echo "<br>", $id_person, "<br>";
			echo $name_person, "<br>";
			echo $last_person, "<br>";

			//Insertar datos del elector
			$sql = "INSERT INTO personas(id_person, name_person, last_person, name_imagen, imagen, tipo_imagen) VALUES ('$id_person', '$name_person', '$last_person', '".$nombreArchivo."','".$binariosImagen."','".$tipoArchivo."')";
			//$resultado = mysqli_query($con, $sql);
			$result = mysqli_query($con, $sql);
			if(!$result){
				die("error en la consulta o en la conexion con la base de datos");
			}

			$_SESSION['message'] = 'Datos guardados';
			$_SESSION['message_type'] = 'success';

			header("location: ../index.php");

		}
	}

?>



