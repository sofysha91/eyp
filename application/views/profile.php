<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('header.php'); ?>

</head>

<body>

<div id="wrapper">
<div id="divHeader" class="blueHeader" >
<nav class="navbar navbar-inverse blueHeader">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/eyp/"><img  class="imgLogo" src="<?php echo base_url(); ?>public/images/logo.png" width="120"  /></a>
    </div>
    <?php include('menu.php'); ?>
  </div>
</nav>

<nav class="navbar navbar-inverse blueLightHeader">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="btn-group btn-group-justified nav navbar-nav">
        <li class="secondNav  liExact activeLink"><a href="<?php echo site_url("home"); ?>" class="btn">TODAS LAS PUBLICACIONES</a></li>
        <li class="secondNav liExact"><a href="<?php echo site_url("home/adopciones"); ?>" class="btn">ADOPCIONES</a></li>
        <li class="secondNav liExact"><a href="<?php echo site_url("home/encontrados"); ?>" class="btn">¡LO ENCONTRAMOS!</a></li>
        <li class="secondNav liExact"><a href="<?php echo site_url("home/perdidos"); ?>" class="btn">PERDIDOS</a></li>
      </ul>
     
    </div>
  </div>
</nav>
</div>
        <div id="page-wrapper">
            <br>
            <div class="row">

                <!--Left Sidebar -->
                <div class="col-lg-3">

                     <div id="imgProfile">
                     
                      <?php if($datos["0"]->foto == NULL){ ?>
                        <img src="<?php echo base_url(); ?>public/images/paw.jpg" width='250' >
                      <?php } else { ?>
                          <img src="<?php echo base_url(); ?>public/docs/<?php echo $id."/".$datos["0"]->foto; ?>" width='250'>
                      <?php } ?>
                     
                      
                     
                    </div>

                    <?php if($edit == true){ ?>
                    <div class="fileUpload divHoverProfile" style="display:none;">
                     <form enctype="multipart/form-data" method="POST" action="<?php echo site_url("profile/changeProfilePhoto"); ?>">
                        <span class="glyphicon glyphicon-camera" aria-hidden="true">&nbsp;Subir una foto</span>
                        <input type="file" class="upload" name="imgPost" id="imgPhoto" accept="image/*"/>
                        <input type='hidden' name='id' id="idUser"  value="<?php echo $id ?>">
                        <input type="submit" hidden>
                     </form>
                    </div>
                    <?php } ?>

                    <!-- Mostramos los demas datos-->
                   <br>
                   <p><h3> <?php echo $datos["0"]->name; ?></h3></p>
                   <br>
                   <div class="panel panel-default panelData">
                    

                      <ul class="list-group">
                       <?php if($edit == true){ ?>  
                        <a data-toggle="modal" href="#data_modal" class="text-right"><i class="fa fa-pencil-square-o" aria-hidden="true">Editar mis Datos</i></a>
                       <?php } ?>
                        <li class="list-group-item"><i class="fa fa-home" aria-hidden="true"></i>
                          <?php echo " ".$datos["0"]->colonia?>
                        </li>
                        <li class="list-group-item"><i class="fa fa-globe" aria-hidden="true"></i>
                          <?php echo " ".$datos["0"]->municipio?>
                        </li>
                        <li class="list-group-item"><i class="fa fa-phone" aria-hidden="true"></i>
                          <?php echo " ".$datos["0"]->telefono?>
                        </li>
                        <li class="list-group-item"><i class="fa fa-mobile" aria-hidden="true"></i>
                          <?php echo " ".$datos["0"]->celular?>
                        </li>
                      </ul>
                     

                   </div>
               
              

                    <!-- Fin de Datos -->

                  </div>

                <!-- fin Left Sidebar -->

                <!-- Middle Section -->
                <div class="col-lg-6">
                <!-- Main Content -->
                    
                    <!-- Post -->
                        <ul id="ulPost" class="media-list">
                          
                        </ul>

                    <!-- Post -->
                    
                 </div>   
                <!-- /.col-lg-8 -->
                <!-- Fin Middle Section -->

                       <!-- /.row -->

         
        
        <!-- /#page-wrapper -->

        </div>

    </div>
    <br><br>
    <!-- Modal para cambiar contraseña -->
<div class="modal" id="data_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Actualizar mis datos</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" method="POST" action="<?php echo site_url("profile/edit"); ?>">
        <div class="form-group">          
          <div class="col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2"><i class="fa fa-home" aria-hidden="true"></i></span>
              <input class="form-control" type="text" name="txtColonia" value="<?php echo $datos["0"]->colonia?>" >
            </div>
          </div>
        </div>
       <div class="form-group">          
          <div class="col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2"><i class="fa fa-globe" aria-hidden="true"></i></span>
              <input class="form-control" type="text" name="txtMunicipio" value="<?php echo $datos["0"]->municipio?>" >
            </div>
          </div>
        </div>
        <div class="form-group">         
          <div class="col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2"><i class="fa fa-phone" aria-hidden="true"></i></span>
              <input class="form-control" type="text" name="txtTelefono" value="<?php echo $datos["0"]->telefono?>" >
            </div>
          </div>
        </div>
        <div class="form-group">         
          <div class="col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2"><i class="fa fa-mobile" aria-hidden="true"></i></span>
              <input class="form-control" type="text" name="txtCelular" value="<?php echo $datos["0"]->celular?>">
            </div>
          </div>
        </div>
      
      <div class="modal-footer">
        <a href="" class="btn">Cerrar</a>
        <input type="submit" class="btn btn-primary" value="Guardar Cambios" >
      </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->
</div>
    <!--Footer -->
    <?php include('footer.php'); ?>


    <!-- Footer -->
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>public/bootstrap_dashboard/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="path_to/jquery.simplePagination.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      idPerfil = $("#idUser").val();

      //Envio de foto
      $("#imgPhoto").change(function(){
         this.form.submit();
      });
      
      //Boton de carga de foto
      $("#imgProfile").mouseover(function(){
        $(".divHoverProfile").fadeIn();
      });
      $(".divHoverProfile").mouseover(function(){
        $(".divHoverProfile").fadeIn();
      });
      $("#imgProfile").mouseleave(function(){
        $(".divHoverProfile").fadeOut();
      });
      //Cargar los post
      $.ajax({
                     type: 'POST',
                     url: '<?php echo base_url(); ?>index.php/getPost', 
                     data: 'id='+idPerfil+'&category=-1&buscar=false',
                     success:  function (response) 
                     {
                        console.log(response);
                        $("#ulPost").html(response);                      
                     }
                     });


      //Cambiar Contraseña
     $("#btnGuardarCon").on('click', function () { 
        var contrasena = $("#current_password").val();
        var nueva = $("#new_password").val();

         $.ajax({
                     type: 'POST',
                     url: '<?php echo base_url(); ?>index.php/login/cambiarPass', 
                     data: 'contrasena='+contrasena+'&nueva='+nueva,
                     success:  function (response) 
                     {
                        alert(response);                      
                     }
                     });
     });
    });
       function verifyPass(elementI)
        {
          var nueva = $("#new_password").val();
          var nueva2 = $("#confirm_password").val();
          var span = document.getElementById("spnOk");
          var elementI = document.getElementById("confirm_password");

          if(nueva == nueva2 && nueva!="")
          {
            elementI.classList.remove("redBorder");
            $("#btnGuardarCon").removeAttr("disabled");
            span.classList.remove("glyphicon-remove");
            span.classList.add("glyphicon-ok");
          }
          else
          {
            elementI.classList.add("redBorder");
            $("#btnGuardarCon").attr("disabled",true);
            span.classList.remove("glyphicon-ok");
            span.classList.add("glyphicon-remove");
          }
            //elementI.classList.remove("redBorder");
        }

     
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>public/bootstrap_dashboard/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>public/bootstrap_dashboard/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>public/bootstrap_dashboard/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>public/bootstrap_dashboard/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>public/bootstrap_dashboard/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>public/bootstrap_dashboard/dist/js/sb-admin-2.js"></script>

</body>

</html>
