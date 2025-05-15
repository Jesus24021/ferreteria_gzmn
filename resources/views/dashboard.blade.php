<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ferreteria Guzmán</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="icon" href="/img/constructor.png">
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">

    <!--=====================================
    LOGOTIPO
    ======================================-->
    <a href="inicio" class="logo">

      <!-- logo mini -->
      <span class="logo-mini">

        <img src="img/constructor.png" class="img-responsive" style="padding:10px">

      </span>

      <!-- logo normal -->

      <span class="logo-lg">
        Ferreteria Guzman
    </span>


    </a>

    <!--=====================================
    BARRA DE NAVEGACIÓN
    ======================================-->
    <nav class="navbar navbar-static-top" role="navigation">

      <!-- Botón de navegación -->

       <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

            <span class="sr-only">Toggle navigation</span>

          </a>

    </nav>

   </header>


   <aside class="main-sidebar">

    <section class="sidebar">

     <ul class="sidebar-menu">

       <li class="active">

         <a href="plantilla.html">

           <i class="fa fa-home"></i>
           <span>Inicio</span>

         </a>

       </li>

       <li>

         <a href="vista_usuarios.blade.php">

           <i class="fa fa-user"></i>
           <span>Usuarios</span>

         </a>

       </li>

       <li>

         <a href="categorias.html">

           <i class="fa fa-th"></i>
           <span>Categorías</span>

         </a>

       </li>

       <li>

         <a href="productos.blade.php">

           <i class="fa fa-shopping-bag"></i>
           <span>Productos</span>

         </a>

       </li>

       <li>

         <a href="proveedores.blade.php">

           <i class="fa fa-truck"></i>
           <span>Proveedores</span>

         </a>

       </li>
         <li>
             <a href="pedidos.blade.php">

                 <i class="fa fa-shopping-cart"></i>
                 <span>Proveedores</span>

             </a>


       <li class="treeview">

         <a href="#">

           <i class="fa fa-list-ul"></i>

           <span>Ventas</span>

           <span class="pull-right-container">

             <i class="fa fa-angle-left pull-right"></i>

           </span>

         </a>

         <ul class="treeview-menu">

           <li>

             <a href="ventas">

               <i class="fa fa-circle-o"></i>
               <span>Administrar ventas</span>

             </a>

           </li>

           <li>

             <a href="crear_venta.blade.php">

               <i class="fa fa-circle-o"></i>
               <span>Crear venta</span>

             </a>

           </li>

           <li>

             <a href="reportes">

               <i class="fa fa-circle-o"></i>
               <span>Reporte de ventas</span>

             </a>

           </li>

         </ul>

         <li>

          <a href="{{route('logout')}}">

            <i class="fa fa-sign-out"></i>
            <span>Salir</span>

          </a>

        </li>

       </li>

     </ul>

    </section>

 </aside>

  <!-- =============================================== -->

  <div class="content-wrapper">

    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Start creating your amazing application!
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <strong>Copyright &copy; <span id="year"></span>
      <a href="#">Ferretería Guzmán</a>.
    </strong> Todos los derechos reservados.
  </footer>

  <script>
    // Actualiza el año automáticamente
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree(); // Activa los submenús en AdminLTE
  });
</script>
</body>
</html>
