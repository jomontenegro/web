<?php include('php/db_connection.php'); ?>
<?php $page = 3; ?>
<?php include('includes/header.php'); ?>
    
<div class="container" id="main">
    <?php 
        if (isset($_SESSION['message'])) { ?>
            <div class="fade show alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible" role="alert">
                <?= $_SESSION['message']; ?>
            </div>
    <?php session_unset();} ?>
    <div class="row">
        <h1 class="display-4">contienda electoral<br></h1>
    </div>
    <div class="row">
        
        <?php
                $sql_1 = "SELECT id_person, name_person, last_person, COUNT(votos.voto) AS cantidad FROM  votos INNER JOIN  personas ON personas.id_person = votos.voto WHERE personas.id_person = votos.voto GROUP BY votos.voto;";

                $result_sql1 = mysqli_query($con, $sql_1);
                while ($filas1 = mysqli_fetch_assoc($result_sql1)) { ?>
                <div class="col-sm-3">
                    <div class="card text-center">
                      <div class="card-body ">
                        <h6 class="text-center"><br><?php echo $filas1['name_person'] ?></h6>
                        <h6 class="text-center"><?php echo $filas1['last_person'] ?></h6>
                        
                        <h6 class="card text-white bg-warning mb-3"><?php echo $filas1['cantidad'] ?></h6>
                        <p class="h6">Cantidad de Votos</p>

                        <!--<a type="submit" class="btn btn-outline-success" name="elegir">Elegir candidato</a>-->
                      </div>
                    </div>
                    <br>
                  </div>
            <?php } ?>
    </div>
    <div class="row">   
        <?php
            $sql = "SELECT id_person, name_person, last_person, imagen, name_imagen, tipo_imagen FROM personas ORDER BY last_person ASC";
            $result_select = mysqli_query($con, $sql);

            while ($filas = mysqli_fetch_assoc($result_select)) { ?>
                  <div class="col-sm-3">
                    <div class="card text-center">
                      <div class="card-body ">
                        <img class="card-img-top" style="height: 10rem; width: 10rem; border-bottom: 10rem;" alt="Card image cap" src="data:<?php echo $filas['tipo_imagen']; ?>;base64,<?php echo  base64_encode($filas['imagen']); ?>">     
                        <h6 class="text-center"><br><?php echo $filas['name_person'] ?></h6>
                        <h6 class="text-center"><?php echo $filas['last_person'] ?><br></h6>
                        <h6 style="color: #000;"><br># Targeton</h6>
                        <h6 class="text-center"><?php echo $filas['id_person'] ?></h6>
                        <!--<a type="submit" class="btn btn-outline-success" name="elegir">Elegir candidato</a>-->
                        <a onclick="editar(this.id)" href="php/editar.php?id=<?php echo $filas['id_person'] ?> " class="btn btn-outline-success" name="elegir" type="submit" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                            <h6 style="color: #000;">Elegir candidato</h6>

                        </a>
                        <!--<button href="php/votos.php?id=<?php echo $filas['id_person'] ?> " name="elegir" type="submit" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                            <h6 style="color: #000;">Elegir candidato</h6>
                        </button>-->
                      </div>
                    </div>
                    <br>
                  </div>
                <!--acá van los botones-->
            <?php } ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade"  tabindex="-1" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">¡Coloca tus datos para poder elejir un candidato!</h6>
        <p id="variable"></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div >
            <div class="card card-body">
                <form action="php/votos.php" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <input type="number" name="id_usuario" class="form-control" placeholder="Numero de identificacion" autofocus required>
                    </div>                    
                    <div class="form-group">
                        <input type="text" name="name_user" class="form-control" placeholder="Nombres" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_user" class="form-control" placeholder="Apellidos" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="id_person" class="form-control" placeholder="Confirmar # targeton" autofocus required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success" name="enviar" id="variable">Elegir candidato</button>
                    </div>
                </form>
            </div>
      </div>

    </div>
  </div>
</div>
<script>
    function editar(este) {
      var ModalEdit = new bootstrap.Modal(EditModal, {}).show();
      variable.innerHTML = "El id es : " + este;
    }
</script>
<?php include('includes/footer.php'); ?>