<!DOCTYPE html>
<html lang="en">

<head>
 <?php include('header.php'); ?>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
    $(document).ready(function(e){
            $(".img-check").click(function(){
                $(this).toggleClass("check");
            });
    });
      function verifyPass(elementI)
      {
        var nueva = $("#inputPass").val();
        var nueva2 = $("#inputPassSecond").val();
        var resul = document.getElementById("divResul");

        if(nueva == nueva2 && nueva!="")
        {
          //alert("Ok");
          resul.classList.add("has-success");
          $("#submit").removeAttr("disabled");
          
        }
        else
        {
          resul.classList.remove("has-success");
          $("#submit").attr("disabled",true);
        }
          //elementI.classList.remove("redBorder");
      }
    </script>

</head>

<body>

<div id="wrapper">
<div id="divHeader" class="blueHeader" >
<nav class="navbar navbar-inverse blueHeader">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/eyp/"><img class="imgLogo" src="<?php echo base_url(); ?>public/images/logo.png" width="120" /></a>
    </div>
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
        <li class="secondNav liExact"><a href="<?php echo site_url("home"); ?>" class="btn">TODAS LAS PUBLICACIONES</a></li>
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

        <div class="col-lg-6">
        <form role="form" method="post" action="<?php echo site_url("registrar/registro"); ?>">
            <h3>¿Qué tipo de página desea crear?</h3>
            <div class="row">
                
                <div class="form-group">    
                <div style="margin-top:10px;"class="col-md-6"><label class="btn btn-primary"><img src="<?php echo base_url(); ?>public/images/simbolo-vet.jpg"  class="img-thumbnail img-check"><input type="radio" name="group" id="item4" value="4" class="hidden" autocomplete="off"><br>Negocio</label></div>
                <div style="margin-top:10px;"class="col-md-6"><label class="btn btn-primary"><img src="<?php echo base_url(); ?>public/images/consejos.jpg" class="img-thumbnail img-check"><input type="radio" name="group" id="item4" value="3" class="hidden" autocomplete="off"><br>Informativa</label></div>
                <div style="margin-top:10px;" class="col-md-6 col-md-offset-3"><label class="btn btn-primary"><img src="<?php echo base_url(); ?>public/images/ayuda.jpg" class="img-thumbnail img-check"><input type="radio" name="group" id="2" value="val3" class="hidden" autocomplete="off"><br>Organización</label></div>
                </div>
                
                
                
             </div>  
            
        </div>

        <form role="form" method="post" action="<?php echo site_url("registrar/registro"); ?>">
            <div class="col-lg-6">
                <!--<div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Requeridos</strong></div>-->
                 <div class="form-group">
                    <label for="inputNombre">Nombre</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Ingresar Nombre" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Ingresar Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="inputPass" name="inputPass" placeholder="Contraseña" onkeyup="verifyPass(this)" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group" id="divResul">
                    <label for="InputEmail">Confirmar Contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="inputPassSecond" name="inputPassSecond" placeholder="Confirmar Contraseña" onkeyup="verifyPass(this)" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Registrarse" class="btn btn-info pull-right btnPink" disabled="disabled">
            
        </form>
        
            <div class="col-md-12 topMargin">
            <?php  if(validation_errors()){ ?>
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-remove"></span><strong><?php echo validation_errors(); ?></strong>
                </div>
            <?php } ?>
            </div>
            <br><br>

       </div>
    </div>
</div>

    </div>
    <br><br>
    <!--Footer -->
    <?php include('footer.php'); ?>


            <!-- Footer -->
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>public/bootstrap_dashboard/vendor/jquery/jquery.min.js"></script>

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
