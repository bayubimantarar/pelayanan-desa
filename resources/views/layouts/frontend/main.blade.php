<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title') | Desa {{ $pemerintahan->desa }}</title>

  <!-- Bootstrap core CSS -->
  <link
    href="/assets/frontend/vendor/bootstrap/css/bootstrap.min.css"
    rel="stylesheet"
  />

  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/vendor/font-awesome/css/font-awesome.min.css"
  />

  <!-- Custom styles for this template -->
  <link
    href="/assets/frontend/css/modern-business.css"
    rel="stylesheet"
  />

  <style>
    .disabled {
      cursor: not-allowed;
    }
  </style>
</head>

<body>

  @include('layouts.frontend.partials.navbar')

  @yield('content')

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">&copy; Desa {{ $pemerintahan->desa }} 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/assets/frontend/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
