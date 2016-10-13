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

<nav id="navBarMenu" class="navbar navbar-inverse blueLightHeader">
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
            <div class="col-lg-3">     
               <a href="#" id="PublicarPost"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Hacer una Publicación</a>
               <br><br>
                <!--Left Sidebar -->
               <?php include('leftSidebar.php'); ?>
                <!-- fin Left Sidebar -->
            </div>
                <!-- Middle Section -->
                <div class="col-lg-6">
                <!-- Main Content -->
                <!-- Form Post -->
                    <div class="divFormPost">
                        <form method="post" id="formPost" enctype="multipart/form-data" action="<?php echo site_url("post/addPost"); ?>">
                        
                            <div class="tabbable tabs-left">
                              <ul class="nav nav-tabs">
                                  <li class="active"><a href="#menu23" data-toggle="tab">Descripción</a></li>
                                  <li><a href="#menu24" data-toggle="tab"><i class="fa fa-camera" aria-hidden="true"></i></a></li>
                                  <?php if (!$this->session->userdata('is_logged_in'))
                                        { ?>
                                  <li><a href="#menu25" data-toggle="tab"><i class="fa fa-map-marker" aria-hidden="true"></i></a></li>
                                  <?php } ?>
                              </ul>

                              <div class="tab-content">
                                  <div class="tab-pane active" id="menu23">
                                      <div class="form-group">
                                        <br>
                                        <select type="text" class="form-control" name="category" id="sltTipoPost" onchange="changeSelect(this.value)">
                                          <option>-- Selecciona tipo de publicación --</option>
                                          <option value="1">Adopción</option>
                                          <option value="2">Encontrado</option>
                                          <option value="3">Perdido</option>
                                          <option value="4">Información</option>
                                        </select>
                                      </div> 
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="txtRaza" id="txtRaza" placeholder="Raza">
                                      </div>  
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="txtTamano" id="txtTamano" placeholder="Talla">
                                      </div>
                                      <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" rows="3"></textarea>
                                      <br>
                                  </div>
                                  <div class="tab-pane" id="menu24">
                                      <div class="form-group">
                                        <img id="blah" class="block"  src="#" alt=""  width="140" height="150"/>
                                        <input type="file" id="imgInp" name="imgPost" accept="image/*" />
                                      </div>
                                  </div>
                                  <div class="tab-pane" id="menu25">
                                      <?php if (!$this->session->userdata('is_logged_in'))
                                        { ?>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="txtNombre" required id="txtNombre" placeholder="Nombre">
                                      </div>
                                      <?php } ?>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="txtColonia" id="txtColonia" placeholder="Colonia">
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="txtCP" id="txtCP" placeholder="Código Postal">
                                      </div>
                                      <div class="form-group">
                                         <input type="text" class="form-control" name="txtTel" id="txtTel" placeholder="Télefono">
                                      </div>
                                      
                                  </div>
                              </div>
                            </div>
                            
                            <button id="btnSubmit" class="btn btn-primary btnPost">Publicar</button>
                            <br><br>
                        </form>
                    </div>
                    <!-- Form Post -->
                    
                    <!-- Post -->
                        <ul id="ulPost" class="media-list">
                          
                        </ul>

                        

                    <!-- Post -->
                    
                 </div>   
                <!-- /.col-lg-8 -->
                <!-- Fin Middle Section -->

                <!--Right Bar -->
                <?php include('rightSidebar.php'); ?>
               <!--Right Bar -->


            <!-- /.row -->

         
        
        <!-- /#page-wrapper -->

        </div>

    </div>
    <br><br>
    <!--Footer -->
    <?php include('footer.php'); ?>


            <!-- Footer -->
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>public/bootstrap_dashboard/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="path_to/jquery.simplePagination.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $(".divFormPost").hide();



    window.addEventListener("scroll", function(evt) {
    var wrap = document.body.scrollTop;
    //console.log(wrap);
    if (wrap > 82) {
    $("#navBarMenu").addClass("headerFixed");
    $(".divLeftSidebar").addClass("divLeftSidebarFixed");
    $(".divRightSidebar").addClass("divLeftSidebarFixed");
  } else {
    $("#navBarMenu").removeClass("headerFixed");
    $(".divLeftSidebar").removeClass("divLeftSidebarFixed");
    $(".divRightSidebar").removeClass("divLeftSidebarFixed");
  }
  if (wrap > 82) {
    document.getElementById('ulPost').style.height = "1500px";
  }
});
       


       //Cargamos las paginas
       $.ajax({
                     type: 'POST',
                     url: '<?php echo base_url(); ?>index.php/post/getPaginas', 
                     data: '',
                     success:  function (response) 
                     {
                        //console.log(response);
                        $("#ulPaginas").html(response);                   
                     }
                     });

      //Cargar los post
      $.ajax({
                     type: 'POST',
                     url: '<?php echo base_url(); ?>index.php/getPost', 
                     data: 'id=FALSE&category=-1&buscar=false',
                     success:  function (response) 
                     {
                        //console.log(response);
                        $("#ulPost").html(response);   

                     }
                     });

      //POST
      
    
      $("#btnSubmit").click( function(){
        $("#formPost").submit();
      });

      $("#PublicarPost").click(function(){
          $(".divFormPost").show();
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

     function readURL(input) 
        {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

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

        function buscar(busqueda)
        {
          //alert(busqueda.value);
          busca=busqueda.value;
           //Cambiamos el DOM con informacion de la busqueda
           
              $.ajax({
                     type: 'POST',
                     url: '<?php echo base_url(); ?>index.php/getPost', 
                     data: 'id=FALSE&category=-1&buscar='+busca,
                     success:  function (response) 
                     {
                        console.log(response);
                        $("#ulPost").html(response);                      
                     }
                     });
           

        }

        function changeSelect(val) 
        {
            //alert(val);
            switch(val)
            {
              case '1':
               document.getElementById("txtTamano").style.display = "initial";
               document.getElementById("txtRaza").style.display = "initial";
              $('#txtDescripcion').attr('placeholder','Escribe sobre la mascota en adopción');
              break;
              case '2':
               document.getElementById("txtTamano").style.display = "initial";
               document.getElementById("txtRaza").style.display = "initial";
               $('#txtDescripcion').attr('placeholder','Escribe sobre la mascota que encontraste');
              break;
              case '3':
               document.getElementById("txtTamano").style.display = "initial";
               document.getElementById("txtRaza").style.display = "initial";
               $('#txtDescripcion').attr('placeholder','Escribe sobre tu mascota perdida');
              break;
              case '4':
               document.getElementById("txtTamano").style.display = "none";
               document.getElementById("txtRaza").style.display = "none";
               $('#txtDescripcion').attr('placeholder','Escribe aqui');
              break;
            }
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
