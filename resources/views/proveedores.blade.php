<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ferreteria Guzmán</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="icon" href="img/constructor.png">
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

           <i class="fa fa-product-hunt"></i>
           <span>Productos</span>

         </a>

       </li>

       <li>

         <a href="proveedores.html">

           <i class="fa fa-users"></i>
           <span>Proveedores</span>

         </a>

       </li>

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

            <a href="Inicio de sesion.html">

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

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#AgregarUsuario">
          Agregar Proveedor
        </button>


        <div class="box-body">

          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>RFC</th>
                <th>Nombre del Proveedor</th>
                <th>Nombre de la empresa</th>
                <th>Telefono</th>
                <th>Correo Electrónico</th>
                <th>Direccion</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>FER123456T9U</td>
                <td>Aceros y Herramientas del Norte S.A. de C.V.</td>
                <td>Aceros del Norte</td>
                <td>221 600 88 00</td>
                <td>acerosnorte@gmail.com</td>
                <td>Heroica Puebla de Zaragoza, Pue.</td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>PLO321789M2Z</td>
                <td>Trupper S.A de C.V</td>
                <td>Trupper</td>
                <td>246 100 7899</td>
                <td>Trupper@gmail.com</td>
                <td>Tlaxcala Centro</td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>MAT987654J6W</td>
                <td>La ferre de Gabriel S.A de C.V</td>
                <td>La Ferre de Gabriel</td>
                <td>246 202 2326</td>
                <td>ferregabriel@gmail.com</td>
                <td>Nativitas Tlaxcala</td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </div>
                </td>
              </tr>
            </tbody>

          </table>

        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

   <!--Modal crear usuario -->
   <div class="modal fade" id="AgregarUsuario" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center" style="background:#208454; color:white">
                <h3 class="modal-title" id="modalLabel"> Registrar Proveedor</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="formRegistroUsuario">
                    <div class="form-group">
                        <label for="nombre">RFC</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Ingrese RFC valido" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Nombre Fiscal</label>
                        <input type="text" class="form-control" id="email" placeholder="Ingrese Nombre Fiscal" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Nombre de la Empresa</label>
                        <input type="email" class="form-control" id="password" placeholder="Ingrese el Nombre de la Empresa" required>
                    </div>

                    <div class="form-group">
                      <label for="email">Telefono</label>
                      <input type="email" class="form-control" id="password" placeholder="Ingrese el Numero de Telefono" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" placeholder="Ingrese Correo Electrónico" required>
                  </div>
                  <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" id="direccion" placeholder="Ingrese la direccion" required>
                  </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" id="guardarUsuario"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
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
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
    $(document).ready(function () {
      $('.sidebar-menu').tree(); // Activa los submenús en AdminLTE
    });
  </script>

</body>
</html>
