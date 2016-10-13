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
        <li class="secondNav liExact"><a href="<?php echo site_url("home"); ?>" class="btn">TODAS LAS PUBLICACIONES</a></li>
        <li class="secondNav liExact"><a href="<?php echo site_url("home/adopciones"); ?>" class="btn">ADOPCIONES</a></li>
        <li class="secondNav liExact"><a href="<?php echo site_url("home/encontrados"); ?>" class="btn">¡LO ENCONTRAMOS!</a></li>
        <li class="secondNav liExact activeLink"><a href="<?php echo site_url("home/perdidos"); ?>" class="btn">PERDIDOS</a></li>
      </ul>
     
    </div>
  </div>
</nav>
</div>
        <div id="page-wrapper">
            <br>
            <div class="row">

                <div class="col-lg-3">     
                <!--Left Sidebar -->
               <?php include('leftSidebar.php'); ?>
                <!-- fin Left Sidebar -->
                </div>

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
    <script type="text/javascript">   
      $(document).ready(function()
      { 

    window.addEventListener("scroll", function(evt) {
    var wrap = document.body.scrollTop;
    console.log(wrap);
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
                     data: 'id=FALSE&category=3&buscar=false',
                     success:  function (response) 
                     {
                        //console.log(response);
                        $("#ulPost").html(response);                      
                     }
                     });

        $("#imgInp").change(function(){
            //alert("Entro!!");
            readURL(this);
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
                     data: 'id=FALSE&category=3&buscar='+busca,
                     success:  function (response) 
                     {
                        console.log(response);
                        $("#ulPost").html(response);                      
                     }
                     });
           

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
