<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>E-commerce</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
  
    <main>
      @yield('content')
  </main>
  

<!-- jQuery -->
<script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }} "></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<!-- jquery-validation -->
<script src="{{ asset('admin-lte/plugins/jquery-validation/jquery.validate.min.js') }} "></script>
<script src="{{ asset('admin-lte/plugins/jquery-validation/additional-methods.min.js') }} "></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }} "></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin-lte/dist/js/demo.js') }} "></script>
<!-- Page specific script -->

</body>
</html>
