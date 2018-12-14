<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema Ventas Laravel Vue Js- IncanatoIT">
  <meta name="author" content="nibbleframe.com">
  <meta name="keyword" content="Sistema de comunicación de FIS - UNCP">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="img/fis.ico">

  <title>FIS - UNCP</title>

  <!-- Icons -->
  <link rel="stylesheet" href="css/plantilla.css">

</head>

<body class="app flex-row align-items-center">
  <div class="container">
    @yield('login')
  </div>

  <!-- Bootstrap and necessary plugins -->
  <script src="js/plantilla.js"></script>

  <script type="text/javascript">
        var $fvector = $('svg#first').drawsvg({
            duration: 4000
        });
        $fvector.drawsvg('animate');
  </script>

</body>
</html>