<?php  if ($this->session->userdata('is_logged_in'))
      {
    ?> 
    <ul class="nav navbar-nav navbar-right">
     
      <li><a href="<?php echo site_url('profile/view/'.$this->session->userdata('id')); ?>" class="borderRigth">

      <?php if($this->session->userdata('foto')==NULL){ ?>
      <img src="<?php echo base_url(); ?>public/images/paw.jpg" width="30" height="30" class="img-rounded" > 

      <?php } else { ?>
        <img src="<?php echo base_url(); ?>public/docs/<?php echo $this->session->userdata('id')."/".$this->session->userdata('foto'); ?>" width="30" height="30" class="img-rounded"> 
      <?php } ?>
      <?php echo $this->session->userdata('name') ?></a></li> 
      <li><a href="#" class="borderRigth"><i class="fa fa-comments-o fa-2x middleAlign"></i></a></li>
      <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
          <i style="padding-top:6px;" class="fa fa-cog fa-2x middleAlign"></i></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a data-toggle="modal" href="#password_modal"><i class="glyphicon glyphicon-edit"></i> Cambiar Contraseña</a></li>            
            <li><a href="<?php echo site_url("login/logout"); ?>"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
          </ul>
        </li>
      <!--<li><a href="#" class="noBorderRigth"><i class="fa fa-paw fa-2x middleAlign" aria-hidden="true"></i></a></li>-->
      
      <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>--> 
    </ul>
   <?php } else {?>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo site_url("registrar"); ?>" class="borderRigth"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
      <li><a style="margin-right:30px;" href="<?php echo site_url("login"); ?>" class="borderRigth"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li> 
    </ul>
  <?php } ?>
