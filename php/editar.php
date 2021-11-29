<?php 
	include("db_connection.php");

if (isset($_GET['id'])) {
	$page = 2;
	$id_person = $_GET['id'];
	
	$sqlselect = "SELECT * FROM personas WHERE id_person = $id_person";
	//$sql = "DELETE FROM personas WHERE id_person = $id_person";
	$resultado = mysqli_query($con, $sqlselect);

	if (mysqli_num_rows($resultado)==1){
		//echo "Puedes editar el registro";
		//die("Puedes editar el registro");
		$filas = mysqli_fetch_assoc($resultado);
		$id_person = $filas['id_person'];
		$name_person = $filas['name_person'];
		$last_person = $filas['last_person'];
		//echo "de la base de datos...";
		//echo $id_person;
		//echo $name_person;
		//echo $last_person;
	}
	if (isset($_POST['actualizar'])) {
		//echo 'Actualizando <br>';
		$id_person = $_GET['id'];
		$id_persona = $_POST['id_person'];
		$name_person = $_POST['name_person'];
		$last_person = $_POST['last_person'];


		//$imagenSubida = addcslashes(file_get_contents($_FILES['imagen']['tmp_name']));
		//$binariosImagen = fread($imagenSubida, $tamanoArchivo);
		//$binariosImagen = mysqli_escape_string($con, $binariosImagen);

		//echo $id_person, $name_person, $last_person;

		$sql = "UPDATE personas SET (name_person = '$name_person', last_person = '$last_person' WHERE id_person = $id_person";
		$resultado = mysqli_query($con, $sql);
		//$resultado = $con->query($sql)
		if ($resultado){
			$_SESSION['message'] = '¡Datos Actualizados!';
			$_SESSION['message_type'] = 'warning';
			header("Location:../index.php");# code...
		}else{
			echo "No se Actualizo el registro";

		}
	}
	//header("location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud elecciones</title>
    <!--Bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
	<?php //echo $page; 

    ?>
	<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="<?php 
    if ($page == 2) {
        $login = '../index.php';
        echo $login;
    } elseif ($page == 1) {
        $login = 'index.php';
        echo $login;
    }
        //echo $url; 
    ?>" class="navbar-brand">Lista de Candidatos</a>
    </div>
        <div>
            <a href="../index.php" class="btn btn-success">Ir a la lista
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                  <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                  <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                </svg>
            </a>
        </div>
</nav>
	<div class="row">
		<div class=".col-md-4 mx-auto">
			<div class="card card-body">
				<form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
					<div class="form-group">
						<input type="text" name="id_person" value="<?php echo $id_person ?>" class="form-control" placeholder="Numero de Documento" required>
					</div>
					<div class="form-group">
						<input type="text" name="name_person" value="<?php echo $name_person ?>" class="form-control" placeholder="Nombre del Candidato" required>
					</div>
					<div class="form-group">
						<input type="text" name="last_person" value="<?php echo $last_person ?>" class="form-control" placeholder="Apellido del Candidato" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success" name="actualizar">
							Actualizar
						</button>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include "../includes/footer.php" ?>