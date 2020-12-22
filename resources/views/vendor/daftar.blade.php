<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="{{asset('images/sasas.png')}}" rel='shortcut icon'>
  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('bootstrap/css/bootstrap.min.css')!!}
  <!-- Font Awesome -->
  {!! Html::style('bootstrap/font-awesome/css/font-awesome.min.css') !!}
  <!-- Theme style -->
  {!! Html::style('dist/css/AdminLTE.css')!!}
  <style type="text/css">
    body{
      background: url("dist/74.jpg");
      background-size: 100% 100%;
    }
  </style>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="."><b>KMB</b> PJB Unit 9</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><img src="{{asset('images/sasas.png')}}" width="80%" height="70"></p>

    <form action="{{url('daftar')}}" method="post">
      {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nama Vendor" name="vendor" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="No. Telepon" name="tlp" required="">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <textarea class="form-control" placeholder="Alamat" name="alamat" required=""></textarea>
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-danger btn-block btn-flat">Daftar</button>
        </div>
      </div>
    </form>
    <br>
    <div align="center">Sudah akun, <a href="{{url('loginvendor')}}">Masuk disini</a></div>
    <br>
    <div align="center">Copyright &copy; PT PJB UBJOM Paiton</div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
{!! Html::script('plugins/jQuery/jquery-2.2.3.min.js')!!}
{!! Html::script('bootstrap/js/bootstrap.min.js')!!}
</body>
</html>
