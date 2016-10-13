<!-- Modal para cambiar contraseña -->
<div class="modal" id="password_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Cambiar Contraseña</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal">
        <div class="form-group">
          <label for="current_password" class="col-sm-2 control-label">Contraseña</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="current_password" >
          </div>
        </div>
       <div class="form-group">
          <label for="new_password" class="col-sm-2 control-label">Nueva Contraseña</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" onkeyup="verifyPass(this)" id="new_password" >
          </div>
        </div>
        <div class="form-group">
          <label for="confirm_password" class="col-sm-2 control-label">Confirmar Contraseña</label>
          <div class="col-sm-10">
            <div class="input-group">
              <input type="password" class="form-control redBorder" onkeyup="verifyPass(this)" type="password" id="confirm_password" aria-describedby="basic-addon2">
              <span class="input-group-addon" id="basic-addon2"><span id="spnOk" class="glyphicon glyphicon-remove"></span></span>
          </div>
          </div>
        </div>
      </form>
      <div class="modal-footer">
        <a href="" class="btn">Cerrar</a>
        <button disabled="disabled" id="btnGuardarCon" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->
</div>
<div id="divFooter">
        <nav class="navbar navbar-inverse blueHeader navFooter">
               <div class="container-fluid">
                <ul class="nav navbar-nav">
                  <li><a href="#"><p class="pFooter">Ears & Paws</p></a></li>
                  <li><a href="<?php echo site_url("home/aviso_de_privacidad"); ?>"><p class="pFooter">Aviso de Privacidad</p></a></li>
                  <li><a><p class="pFooter">Todos los derechos reservados | 2016</p></a></li>
               </ul>
                <ul class="nav navbar-nav navbar-right rightMargin">
                  <li><p class="pFooter">Siguenos:</p></li>
                  <li><a href="#" ><i class="fa fa-facebook-official fa-2x"></i></a></li>
                  <li><a href="https://twitter.com/EarsAndPaws" target="_blank"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></li>
                  <li><a href="https://www.instagram.com/earsnpaws/" target="_blank"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
                </ul>
              </div>
        </nav>
    </div>