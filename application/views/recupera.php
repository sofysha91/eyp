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
          <div class="col-md-6 col-md-offset-3" style="border:1px solid #d7dfea; padding:50px 30px; margin-top:130px; border-radius:5px;">
              
            <div class="form-group">
            <form method="post" action="<?php echo site_url("home/recupera"); ?>">
                    <label for="InputEmail" style="font-size:19px;">Recupera tu Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></span>
                        <input type="email" class="form-control" id="txtEmail" style="height:50px;" name="txtEmail" placeholder="Ingresa tu Email" required>
                        
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" value="Entrar" class="btn btn-info pull-right btnPink">
                    </div>
            </form>
            </div>

        </div>  
            <div class="col-md-6 col-md-offset-3 topMargin">
            <?php if($this->session->flashdata('msg')): 
              echo '<div class="alert alert-success">
                    <span class="glyphicon glyphicon-ok"></span><strong> Se ha enviado un correo electrónico favor de verificar para poder iniciar sesión.</strong>
                   </div>';
            endif; ?>
            <?php  if(validation_errors()){ ?>
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-remove"></span><strong> <?php echo validation_errors(); ?></strong>
                </div>
            <?php } ?>
            </div>

          
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
