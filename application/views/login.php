<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ears & Paws</title>    

     <?php include('header.php'); ?>

</head>

<body>

<div id="wrapper">
<div id="divHeader" class="blueHeader" >
<nav class="navbar navbar-inverse blueHeader">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/eyp/"><img class="imgLogo" src="<?php echo base_url(); ?>public/images/logo.png" width="120"  /></a>
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
        <form role="form" method="post" action="<?php echo site_url("login/verify"); ?>">
            <div class="col-lg-6">
                <h1><i id="iRotate" class="fa fa-paw"></i> Inicia Sesión</h1>
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Ingresar Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="inputPass" name="password" placeholder="Contraseña" onkeyup="verifyPass(this)" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <a href="<?php echo site_url("home/recupera_contrasena"); ?>">¿Olvidaste tu contraseña?</a>
                <input type="submit" name="submit" id="submit" value="Entrar" class="btn btn-info pull-right btnPink">
            
        </form>
        
            <div class="col-md-12 topMargin">
            <?php  if(validation_errors()){ ?>
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-remove"></span><strong><?php echo validation_errors(); ?></strong>
                </div>
            <?php } ?>
            </div>
            
       </div>
       <!-- Segunda Columna -->
            <div class="col-lg-6" style="margin-top:50px;">

            <div class="media mediaLogin">
              <div class="media-left">                
                  <img id="bannerLogin1" class="imgLoginBanners" src="<?php echo base_url(); ?>public/images/adopta.jpg">              
              </div>
              <div class="media-body">
                <h4 class="media-heading">Adopta</h4>
                Abre las puertas de tu hogar a un amigo!.
              </div>
            </div>
            <div class="media mediaLogin">
              <div class="media-left pull-right">                
                  <img id="bannerLogin1" class="imgLoginBanners" src="<?php echo base_url(); ?>public/images/encuentra-2.jpg">              
              </div>
              <div class="media-body">
                <h4 class="media-heading">¿Lo encontraste?</h4>
                 Busca a su dueño en nuestro sitio!.
              </div>
            </div>
            <div class="media mediaLogin">
              <div class="media-left">                
                  <img id="bannerLogin1" class="imgLoginBanners" src="<?php echo base_url(); ?>public/images/perdida.jpg">              
              </div>
              <div class="media-body">
                <h4 class="media-heading">Reporta Perdidas</h4>
                ¿Perdiste tu mascota? Nosotros te ayudamos a encontrarla!
              </div>
            </div> 

            </div>

            <!-- Fin Segunda Columna-->
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
