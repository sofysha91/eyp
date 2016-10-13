<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ears & Paws</title>    

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>public/bootstrap_dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>public/bootstrap_dashboard/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>public/bootstrap_dashboard/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>public/bootstrap_dashboard/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>public/bootstrap_dashboard/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Personal CSS -->
    <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">
    <link rel="<?php echo base_url(); ?>public/css/font-awesome/css/font-awesome.min.css">

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
              <div class="jumbotron" id="divAviso">
                <div class="container" id="divPrivacidad">
                  <h1>AVISO DE PRIVACIDAD</h1>
                      <p>El objetivo del sitio web es presentarles los productos y beneficios de Ears&Paws y el mismo se encuentra disponible para su información, e interés. Los siguientes Términos de Uso, que podrán ser modificados periódicamente, se aplicaran a todos los que accedan al sitio, como así también a su uso y contenidos.
                </p>
                <br>
                <p>
                <i class="fa fa-paw"></i> Objetivos de la información
                El contenido presentado en el sitio de Ears&Paws, solo tiene por finalidad la comunicación. El sitio no provee consejos ni recomendaciones de ningún tipo y no deberá utilizarse como base de cualquier decisión o acción. Se recomienda consultar a los profesionales idóneos del campo correspondiente con respecto a la aplicabilidad de cualquier aspecto del contenido.
                </p>
                <br>
                <p>
                <i class="fa fa-paw"></i> Responsabilidad
                Ears&Paws no se hace responsable de ningún daño o lesión originada de su acceso al sitio o por imposibilidad de acceder a el o por confiar en cualquier información suministrada aquí. Ears&Paws rechaza cualquier responsabilidad por daños directos, indirectos, accidentales, consecutivos, especiales o de otro tipo, oportunidades y beneficios perdidos o cualquier otra pérdida o daño. Esta limitación incluye daños o virus que puedan afectar a su equipo de computación.
                </p><br><p>
                <i class="fa fa-paw"></i> Vínculos con otros sitios de la web
                Cualquier vínculo con otro sitio de Internet se presenta para la mayor conveniencia del usuario. Ears&Paws no tiene responsabilidad ni control sobre el contenido o la operación de tales sitios y no será responsable por ningún daño o perjuicio surgido de ese contenido o de su operación.
                </p><br><p>
                <i class="fa fa-paw"></i> Modificaciones
                Ears&Paws se reserva el derecho de alterar, modificar, reemplazar o borrar cualquier contenido, restringir el acceso o suspender la distribución de este sitio en cualquier momento y bajo su exclusiva discreción.
                </p><br><p>
                <i class="fa fa-paw"></i> Propiedad intelectual y uso del contenido
                El contenido de este sitio es propiedad de Ears&Paws y se encuentra protegido por las leyes de la propiedad intelectual. Las marcas registradas, comerciales y de servicios, como así también los logotipos y productos mencionados en este sitio están legalmente protegidos y no se podrán utilizar ninguno de ellos sin el consentimiento previo y por escrito de Ears&Paws. No obstante, es usted bienvenido a descargar su contenido, solo para uso personal, no comercial. No se autoriza ninguna modificación ni reproducción del contenido y éste no podrá ser copiado ni utilizado de ninguna otra manera.
                </p><br><p>
                <i class="fa fa-paw"></i> Privacidad y Protección de Datos
                En estricto acatamiento a lo dispuesto por la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (en lo sucesivo "la Ley"), Ears&Paws hace de su conocimiento lo siguiente:
                <br>
                a. Los datos personales y/o sensibles y/o información que de manera voluntaria nos proporcione o haya proporcionado, es completamente confidencial y se encuentra resguardada por Ears&Paws, quien es el responsable del uso y tratamiento de sus datos personales. 
                <br>
                b. La utilización de los datos recopilados será utilizado exclusivamente para: (i) proveer servicios requeridos así como actividades afines; (ii) informar sobre nuevos servicios que estén relacionado con el contratado; (iii) dar cumplimiento a obligaciones contraídas con nuestros clientes; (iv) evaluar la calidad del servicio; (v) fines de identificación; (vi) fines estadísticos; y (vii) para eventualmente contactarlo con el fin de compartirle noticias de interés sobre derecho. 
                <br>
                c. Por virtud de la transferencia de datos que nos otorgue o hubiese otorgado con anterioridad, autoriza a Ears&Paws a utilizar la información proporcionada para los fines descritos anteriormente. 
                <br>
                d. Nos comprometemos a no transmitir, vender, alquilar, revelar ni utilizar su información personal a favor de terceras personas sin su consentimiento, con excepción de aquella información que sea necesario para los fines que la haya proporcionado, o bien, sea requerida por las autoridades federales o locales, en términos de las leyes aplicables. 
                <br>
                e. Usted tiene el derecho de acceder a sus datos personales que poseemos y a los detalles del tratamiento de los mismos, así como a rectificarlos en caso de ser inexactos o instruirnos cancelarlos cuando considere que resulten ser excesivos o innecesarios para las finalidades que justificaron su obtención u oponerse al tratamiento de los mismos para fines específicos. 
                <br>
                f. Para ejercer los derechos de acceso, rectificación, cancelación u oposición, el titular de datos personales y/o sensibles que se encuentren en poder de Ears&Paws, deberá enviar la solicitud respectiva al correo electrónico contacto@earsandpaws.com.mx.
                <br>
                g. El presente Aviso de Privacidad podrá ser modificado y actualizado en cualquier momento, en cuyo caso Ears&Paws, notificará los cambios correspondientes mediante la página web www.earsandpaws.com.mx.
                </p><br><p>
                <i class="fa fa-paw"></i> Créditos y tecnología.
                Desarrollo gráfico web, programación del sitio, los enlaces de hipertexto, bases de datos o demás elementos multimedia se realizaron por parte de Ears&Paws. Todos los contenidos facilitados en este portal Web han sido elaborados con información procedente de Ears&Paws, como fuente externa a la propia compañía, motivo por el cual Ears&Paws no se hace responsable de la posible falta de actualización o inexactitud de la información perteneciente a dichas fuentes externas.
                </p><br><p>
                <i class="fa fa-paw"></i> Leyes vigentes
                Las presentes políticas y aviso de privacidad, así como el manejo en general de la Ley que haga  Ears&Paws, se rige por la legislación vigente y aplicable en los Estados Unidos Mexicanos, cualquier controversia que se suscite con motivo de su aplicación deberá ventilarse ante los órganos jurisdiccionales competentes en la Ciudad de Guadalajara, Jalisco, México.</p>
                </div>
              </div>
                


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
    $(document).ready(function(){
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