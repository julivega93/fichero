<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Bienvenido! Have a nice day!</title>
  </head>

  <body>
    <div class="container">
    <div class="row">
    <div class="col-12">

    <h1 class="text-center mb-5">Bienvenido!<br><span class="text-info">Que tengas un gran día!</span></h1>
    <button type="button" class="btn btn-light px-3 panel float-right" data-toggle="modal" data-target="#staticBackdrop">
    <i class="fa fa-user-secret" aria-hidden="true"></i> Panel Administrador 
    </button>
    </div></div>
    <div class="row">
    <div class="col-12 mx-auto">
      <?php 
      if($this->session->flashdata('ERROR')){ ?>
          <div class="alert alert-danger alert-dismissible fade show"><strong>Atención! </strong>El PIN ingresado es incorrecto
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
      <?php } ?>
      <?php 
      if($this->session->flashdata('DESACTIVADO')){ ?>
          <div class="alert alert-danger alert-dismissible fade show"><strong>Atención! </strong>El usuario ha sido desactivado. Contacta con el administrador
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
      <?php } ?>
   

    <form method="post" action="<?php echo site_url('inicio/ingreso')?>">
      <div class="card mx-auto mt-2 rounded shadow-sm" style="width: 18rem;">
      <div class="card-body">
          <h5 class="card-title">PIN de empleado</h5>
          <h6 class="card-subtitle mb-2 text-muted">Identificarse <i class="fa fa-id-card" aria-hidden="true"></i></h6>
          <input type="text" class="form-control" name="pin" id="pin">
          <button type="submit" class="btn btn-primary w-100 mt-4">Ingresar <i class="fa fa-sign-in float-right mt-1" aria-hidden="true"></i></button>
          
      </div>
      </div>
    </form>
   
    

    </div> <!-- fin col-12 -->
    </div> <!-- fin row -->
    </div> <!-- fin container -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-dark text-light">
            <h5 class="modal-title" id="modal">Identificación PANEL ADMIN <i class="fa fa-lock" aria-hidden="true"></i></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body bg-dark text-light">
            <form method="post" action="<?php echo site_url('inicio/ingreso_admin')?>">
              <label for="pinadm"><strong>PIN de ADMINISTRADOR:</strong></label>
              <input type="text" id="pinadm" name="pinadm" class="form-control bg-secondary text-light pinadm" >
          </div>
          <div class="modal-footer bg-dark text-light">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Ingresar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
      $(".panel").click(function(){
        $("#pinadm").focus();
      })
       
      
    })
    </script>

  </body>
</html>