<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="admin/plugins/sweetalert2.css">


</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Inicio de Sesion</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="login" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <!-- /.social-auth-links -->

    <button class="btn btn-primary" data-toggle="modal" data-target="#registro">Registrar</button>


  </div>
  <!-- /.login-box-body -->
</div>

<div class="modal fade" id="registro">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Registrar</h4>
          </div>
          <div class="modal-body">
              <form id="registrar"  method="post" >
        
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Nombre</label>
                  <input type="text" name="nombre" class="form-control"  placeholder="" required>
                </div>
                
                <div class="cantidad_entrada form-group col-md-6">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="" required>
                </div>
               <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" name="pass" class="form-control"  placeholder="" required>
                </div>
                 <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Tipo</label>
                  <select name="tipo" class="form-control">
                    <option value="1">Organizador</option>
                    <option value="2">Asistente</option>
                    <option value="3">Portero</option>
                  </select> 
                </div>
              
                
               <button type="submit" id="add_entrada" class="btn btn-primary">Registrar</button>
              </form>
            </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<script src="admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="admin/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/se-1.2.0/datatables.min.js"></script><script src="admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="admin/plugins/timepicker/timepicki.js"></script>
<script src="admin/plugins/sweetalert2.js"></script>
<script type="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
<script src="admin/block.js"></script>
<script src="admin/eventos.js"></script>




</body>
</html>