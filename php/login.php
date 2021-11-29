<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<?php include('db_connection.php'); ?>

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
</nav>
<div class="row">
	<div class=".col-md-4 mx-auto">
		<?php 
            if (isset($_SESSION['message'])) { ?>
                <div class="fade show alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible" role="alert">
                    <?= $_SESSION['message']; ?>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                </div>
        	<?php session_unset();} ?>
		<div class="card card-body">
			<form action="validar.php" method="post" class="form-group">
				<div class="panel-heading text-center">
					<h2>Iniciar como Administrador</h2>
					<div class="form-group">
						<input type="text" name="usu_admin" class="form-control" placeholder="Usuario" autofocus>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Contraseña" autofocus>
					</div>
					<div>
						<input type="submit" class="btn btn-success" name="Ingresar">
					</div>
				</div>
			</form>	
		</div>
	</div>
</div>
<?php include('../includes/footer.php')?>
</body>
</html>