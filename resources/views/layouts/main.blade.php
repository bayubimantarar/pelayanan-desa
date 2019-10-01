<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/vendor/bootstrap/css/bootstrap.css"
  />
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/vendor/metisMenu/metisMenu.min.css"
  />
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/dist/css/sb-admin-2.css"
  />
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/vendor/morrisjs/morris.css"
  />
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/vendor/font-awesome/css/font-awesome.min.css"
  />
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/css/custom.css"
  />
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/css/bootstrap-social-button.css"
  />
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  @yield('css')
</head>
<body>
  <div id="wrapper">
    @include('layouts.partials.navbar')
    <div id="page-wrapper">
      @yield('content')
    </div>
  </div>
  <script
    type="text/javascript"
    src="/assets/vendor/jquery/jquery.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/vendor/bootstrap/js/bootstrap.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/vendor/metisMenu/metisMenu.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/dist/js/sb-admin-2.js"></script>
  @yield('js')
</body>
</html>
