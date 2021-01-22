<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>APP_NOMBRE</title>
  </head>

  <body>

    <h1 class="text-center mb-5">EMPRESA<br></h1>

    
    <form method="post" action="<?php echo site_url('panel/comienzo_jornada')?>">
    <div class="card mx-auto mt-2 rounded shadow-sm" style="width: 50rem;">
    <div class="card-body">
    <?php 
       
      foreach ($ficha as $f){ 
         if($f['salida']==NULL){ 
    ?>

    <h4 class="card-title text-info mb-5">Has ingresado al sistema.<span><a href="<?php echo site_url('panel/cancelar')?>" class="btn btn-light rounded float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a></span></h4>

    <?php  
          }else{
    ?>

      <h4 class="card-title text-info mb-5">Comenzar nueva jornada!<span><a href="<?php echo site_url('panel/cancelar')?>" class="btn btn-light rounded float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a></span></h4>

    <?php   
          } 
      }
          
    ?>
        <h5>Nombre:</h5>
        <div class="alert alert-secondary" role="alert"><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo $this->session->userdata('nombre')?></div>

        <h5>Apellido:</h5>
        <div class="alert alert-secondary" role="alert"><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo $this->session->userdata('apellido')?></div>

        <h5>Pin:</h5>
        <div class="alert alert-secondary" role="alert"><i class="fa fa-key" aria-hidden="true"></i> <?php echo $this->session->userdata('pin')?></div>
       
        <h5>Registro de ingreso: </h5>
                  
        <?php 

            foreach ($ficha as $f){
                $fecha = strtotime($f['entrada']);
                if($f['salida']==NULL){
        ?>
                  

                  <div class="alert alert-secondary" role="alert"><?php echo standard_date('DATE_RFC850', $fecha);?></div>
                  <a href="#" class="btn btn-secondary mt-4 disabled" id="trabajando">TRABAJANDO... <i class="fa fa-cog fa-spin" aria-hidden="true"></i>
                  <a href="<?php echo site_url('panel/salida_ficha/'.$f['registro_id'])?>" class="btn btn-danger mt-4 float-right">TERMINAR JORNADA LABORAL</a></a>
        <?php      
          }else{
        ?>
                  <div class="alert alert-secondary" role="alert" id="alert"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Listo para empezar!</div>
                  <button type="submit" class="btn btn-success w-100 mt-4" id="comenzar">COMENZAR</button>

        <?php  }}; ?>
        
    </div>
    </div>
    </form>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){

    })
    </script>

  </body>
</html>