<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title') | Desa {{ $pemerintahan->desa }}</title>
  <link
    href="/assets/frontend/vendor/bootstrap/css/bootstrap.css"
    rel="stylesheet"
  />
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/vendor/font-awesome/css/font-awesome.min.css"
  />
  <link
    rel="stylesheet"
    href="/assets/frontend/css/modern-business.css"
  />
  <link
    rel="stylesheet"
    href="/assets/frontend/css/select2.css"
  />
  <link
    rel="stylesheet"
    href="/assets/frontend/css/select2-bootstrap4.css"
  />
  <link
    rel="stylesheet"
    href="/assets/frontend/css/reboot.css"
  />
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/vendor/font-awesome/css/font-awesome.min.css"
  />
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap"
  />
  <style>
    .disabled {
      cursor: not-allowed;
    }
    ul.timeline {
      list-style-type: none;
      position: relative;
    }
    ul.timeline:before {
      content: ' ';
      background: #d4d9df;
      display: inline-block;
      position: absolute;
      left: 29px;
      width: 2px;
      height: 100%;
      z-index: 400;
    }
    ul.timeline > li {
      margin: 20px 0;
      padding-left: 20px;
    }
    ul.timeline > li:before {
      content: ' ';
      background: white;
      display: inline-block;
      position: absolute;
      border-radius: 50%;
      border: 3px solid #22c0e8;
      left: 20px;
      width: 20px;
      height: 20px;
      z-index: 400;
    }
    .footer {
      position: absolute;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>

<body>

  @include('layouts.frontend.partials.navbar')

  @yield('content')

  <!-- Bootstrap core JavaScript -->
  <script
    type="text/javascript"
    src="/assets/frontend/vendor/jquery/jquery.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/bootstrap-typehead.min.js"
  ></script>
</body>
</html>
