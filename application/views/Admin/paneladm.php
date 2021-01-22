<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Panel de Administrador</title>
  </head>

  <body>
    <div class="container">
    <div class="row">

    <div class="col-12">
        <h1 class="text-center mb-5">ADMIN</h1>
    </div> <!-- fin col-12 -->
    </div> <!-- fin row -->
    
    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#registros" role="tab" aria-controls="v-pills-home" aria-selected="true">Registros</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#usuarios" role="tab" aria-controls="v-pills-profile" aria-selected="false">Empleados</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
            </div>
        </div><!-- fin col-3 -->

        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="registros" role="tabpanel" aria-labelledby="v-pills-home-tab">
                
                <nav class="navbar navbar-light bg-light mb-2">
                <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    <a href="<?php echo site_url('panel/cancelar')?>" class="btn btn-light rounded float-right">Volver</a>
                </nav>
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr class="shadow-sm">
                                <th scope="col"><i class="fa fa-id-card-o" aria-hidden="true"></i> Registro ID</th>
                                <th scope="col"><i class="fa fa-user-o" aria-hidden="true"></i> Empleado ID</th>
                                <th scope="col"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Entrada</th>
                                <th scope="col"><i class="fa fa-calendar-times-o" aria-hidden="true"></i> Salida</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($registros as $r){ ?>
                            <tr>
                                <th scope="row"><?php echo $r['registro_id']?></th>
                                <td><?php echo $r['empleado_id']?></td>
                                <td><?php echo $r['entrada']?></td>
                                <td><?php echo $r['salida']?></td>
                                <td><?php echo $r['estado']?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <div class="float-right">
                    <?php echo $this->pagination->create_links();?>
                    </div>

                
                </div>
                <div class="tab-pane fade" id="usuarios" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <nav class="navbar navbar-light bg-light mb-2">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Empleado
                    </button>
                    <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    <a href="<?php echo site_url('panel/cancelar')?>" class="btn btn-light rounded float-right">Volver</a>
                </nav>
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr class="shadow-sm">
                                <th scope="col">#ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Pin</th>
                                <th scope="col">Último login</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Rol</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($usuarios as $u){ ?>
                            <?php if($u['rol']=='a'){?>
                                <tr class="bg-info">
                            <?php }else if($u['estado']==0){ ?>
                                <tr class="bg-secondary">
                            <?php }else{ ?>
                                <tr>
                            <?php } ?>
                                <th scope="row"><?php echo $u['empleado_id']?></th>
                                <td><?php echo $u['nombre']?></td>
                                <td><?php echo $u['apellido']?></td>
                                <td><?php echo $u['pin']?></td>
                                <td><?php echo $u['ultlogin']?></td>
                                <td><?php echo $u['estado']?></td>
                                <td><?php echo $u['rol']?></td>
                            
                                <td>
                                <?php if($u['estado']==1){ ?>
                                    <a href="<?php echo site_url('admin/borrar_usuario/'.$u['empleado_id'])?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                <?php }else{ ?>
                                    <a href="<?php echo site_url('admin/activar_usuario/'.$u['empleado_id'])?>" class="btn btn-sm btn-warning"><i class="fa fa-unlock" aria-hidden="true"></i></a>
                                <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

<?php 
                    if($this->session->flashdata('EXITO')){ ?>
                        <div class="alert alert-success alert-sm float-right exito">Usuario creado con éxito!</div>
                    <?php } ?>
                    <?php if($this->session->userdata('ERROR')){ ?>
                        <div class="alert alert-danger alert-sm float-right error">El pin ingresado ya existe.</div>
                    <?php } ?>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
            </div>

        </div><!-- fin col-9 -->
    </div><!-- fin row -->

    </div> <!-- fin container -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-dark text-light">
            <h5 class="modal-title" id="modal"><i class="fa fa-plus" aria-hidden="true"></i> Crear nuevo usuario: </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body bg-dark text-light">
            <form method="post" action="<?php echo site_url('admin/nuevo_usuario')?>">
              <label for="nombre"><strong>Nombre:</strong></label>
              <input type="text" id="nombre" name="nombre" class="form-control bg-secondary text-light">

              <label for="apellido"><strong>Apellido:</strong></label>
              <input type="text" id="apellido" name="apellido" class="form-control bg-secondary text-light">

              <label for="Pin"><strong>Pin:</strong></label>
              <input type="text" id="pin" name="pin" class="form-control bg-secondary text-light">
          </div>
            <div class="modal-footer bg-dark text-light">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Confirmar</button>
                
            </form>
            </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        $(".exito").fadeOut(7000);
        $(".error").fadeOut(7000);
    })
    </script>

  </body>
</html>