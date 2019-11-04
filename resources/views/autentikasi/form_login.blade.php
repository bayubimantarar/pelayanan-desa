<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login | Pelayanan Desa Cilame</title>
  <!-- Bootstrap Core CSS -->
  <link
    rel="stylesheet"
    href="/assets/vendor/bootstrap/css/bootstrap.css"
  />
  <!-- MetisMenu CSS -->
  <link
    rel="stylesheet"
    href="/assets/vendor/metisMenu/metisMenu.min.css"
  />
  <!-- Custom CSS -->
  <link
    rel="stylesheet"
    href="/assets/dist/css/sb-admin-2.css"
  />
  <!-- Custom Fonts -->
  <link
    rel="stylesheet"
    href="/assets/vendor/font-awesome/css/font-awesome.min.css"
  />
  <link
    rel="stylesheet"
    type="text/css"
    href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap"
  />
  <link
    rel="stylesheet"
    href="/assets/css/custom.css"
  />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
              Login
            </h3>
        </div>
        <div class="panel-body">
          <form action="/dasbor/autentikasi/login" method="post">
            @if($errors->has('notification'))
              <div class="alert alert-danger" role="alert">
                {{ $errors->first('notification') }}
              </div>
            @endif
            <fieldset>
              <input
                type="hidden"
                name="_token"
                value="{{ csrf_token() }}"
              />
              <div class="form-group {{ $errors->has('email') ? 'has-error has-feedback' : '' }}">
                <label
                  class="control-label"
                  for="email"
                >
                  Email
                </label>
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  id="email"
                  autofocus
                  value="{{ old('email') }}"
                />
                @if($errors->has('email'))
                  <span
                    class="glyphicon glyphicon-remove form-control-feedback"
                  ></span>
                  <p class="text-danger">
                    {{ $errors->first('email') }}
                  </p>
                @endif
              </div>
              <div class="form-group {{ $errors->has('password') ? 'has-error has-feedback' : '' }}">
                <label
                  class="control-label"
                  for="password"
                >
                  Kata Sandi
                </label>
                <input
                  type="password"
                  name="password"
                  class="form-control"
                  id="password"
                />
                @if($errors->has('password'))
                  <span
                    class="glyphicon glyphicon-remove form-control-feedback"
                  ></span>
                  <p class="text-danger">
                    {{ $errors->first('password') }}
                  </p>
                @endif
              </div>
              <!-- Change this to a button or input when using this as a form -->
              <button
                type="submit"
                class="btn btn-lg btn-primary btn-block"
              >
                <i class="fa fa-sign-in"></i>
                Masuk
              </button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- jQuery -->
<script
  type="text/javascript"
  src="/assets/vendor/jquery/jquery.min.js"
></script>
<!-- Bootstrap Core JavaScript -->
<script
  type="text/javascript"
  src="/assets/vendor/bootstrap/js/bootstrap.min.js"
></script>
<!-- Metis Menu Plugin JavaScript -->
<script
  type="text/javascript"
  src="/assets/vendor/metisMenu/metisMenu.min.js"
></script>
<!-- Custom Theme JavaScript -->
<script
  type="text/javascript"
  src="/assets/dist/js/sb-admin-2.js"
></script>
</body>
</html>
