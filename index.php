
<?php include('php/db_connection.php'); ?>
<?php $page = 1; ?>
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
            <a href="elecciones.php" class="btn btn-success">Salir
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                  <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                  <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                </svg>
            </a>
        </div>
</nav>


<div class="container p-4">
    <div class="container p-1 row">
        <canvas id="myChart" width="100px" height="50px"></canvas>        
    </div>
    <div class="row">  
        <div class="col-md-4">
            <?php 
                if (isset($_SESSION['message'])) { ?>
                    <div class="fade show alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible" role="alert">
                        <?= $_SESSION['message']; ?>
                        <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                    </div>
                <?php session_unset();} ?>
            <div class="card card-body">
                <form action="php/guardar_datos.php" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <input type="number" name="id_person" class="form-control" placeholder="Numero de identificacion" autofocus required>
                    </div>                    
                    <div class="form-group">
                        <input type="text" name="name_person" class="form-control" placeholder="Nombres" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_person" class="form-control" placeholder="Apellidos" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="archivo" class="control-label"> Cargar Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*" required>
                    </div>
                    <input type="submit" class="btn btn-success" name="enviar">
                </form>
            </div>
        </div>
        <!--TABLA DE DATOS DE LOS CANDIDATOS-->
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <th>Numero de Identidad</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM personas ORDER BY last_person ASC";
                    $result_select = mysqli_query($con, $sql);
                    while ($filas = mysqli_fetch_array($result_select)) { ?>
                        <tr> 
                            <td><?php echo $filas['id_person'] ?></td>
                            <td><?php echo $filas['last_person'] ?></td>
                            <td><?php echo $filas['name_person'] ?></td>
                            
                            <td>
                                <a href="php/editar.php?id=<?php echo $filas['id_person'] ?> " class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                                </a>
                                <a href="php/eliminar.php?id=<?php echo $filas['id_person'] ?> " class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!--FIN TABLA DE DATOS DE LOS CANDIDATOS-->
    </div>
</div>

<?php include('includes/footer.php'); ?>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 40, 3, 5, 2, 3, 10, 14, 27, 13, 11, 2],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>




<!--
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="bg-success text-white text-center m-1">
                    <div class="card-header">Total de votos por participante</div>
                    <div class="card-body">
                        <h5 class="h1 card-title"><span id="idVendidos">35</span></h5>
                        <p class="card-text">Baja en las ventas vs mes anterior</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-warning text-white text-center m-1">
                    <div class="card-header">Total en almacen</div>
                        <div class="card-body">
                        <h5 class="h1 card-title"><span id="idAlmacen">35</span></h5>
                        <p class="card-text">Inventario mayor vs el mes pasado.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-info text-white text-center m-1">
                    <div class="card-header">Total Ingresos</div>
                        <div class="card-body">
                        <h5 class="h1 card-title"><span id="idIngreso">35</span></h5>
                        <p class="card-text">Disminución de ingresos vs mes anterior.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12 text-center">
                <h2>Reporte de ventas</h2>
                <canvas id="idGrafica" class="grafica"></canvas>
            </div>
        </div>
        <div class="row  my-3">
            <div class="col-md-12 text-center">
                <div id="idContTabla"></div>
            </div>
        </div>
    </div>
-->

