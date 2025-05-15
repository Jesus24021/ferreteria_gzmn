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
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
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

         <a href="proveedores.blade.php">

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

             <a href="crear_venta.html">

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

        <button class="btn btn-primary" data-toggle="modal" data-target="#AgregarProducto">
          Agregar Venta
        </button>


        <div class="box-body">

          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Unidad de Medida</th>
                <th>Fecha de Venta</th>
                <th>Hora de Venta</th>
                <th>Total</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Bote de pintura vinílica blanca (19L)</td>
                <td>950.00</td>
                <td>2</td>
                <td>Cubeta</td>
                <td>2025-03-27</td>
                <td>11:15 AM</td>
                <td>1,900.00</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Martillo de Uña 16 oz</td>
                <td>189.00</td>
                <td>1</td>
                <td>Pieza</td>
                <td>2025-03-27</td>
                <td>15:45 PM</td>
                <td>189.00</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Llave Stilson 14”</td>
                <td>320.00</td>
                <td>3</td>
                <td>Pieza</td>
                <td>2025-03-22</td>
                <td>03:20 PM</td>
                <td>960.00</td>
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
   <div class="modal fade" id="AgregarProducto" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center" style="background:#208454; color:white">
                <h3 class="modal-title" id="modalLabel"> Registrar Venta</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="formRegistroCategoria">
                    <div class="form-group">
                        <label for="categoria">Producto</label>
                        <input type="text" class="form-control" id="categoria" placeholder="Nombre del Producto" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="Descripción_cat" placeholder="Precio del Producto" required>
                    </div>
                    <div class="form-group">
                      <label for="descripcion">Cantidad</label>
                      <input type="number" class="form-control" id="Descripción_cat" placeholder="Cantidad Vendida" required>
                    </div>
                    <div class="form-group">
                      <label for="descripcion">Unidad de Medida</label>
                      <input type="text" class="form-control" id="Descripción_cat" placeholder="Unidad de Medida" required>
                    </div>
                    <div class="form-group">
                       <label for="descripcion">Fecha de Venta</label>
                       <input type="date" class="form-control" id="Descripción_cat" placeholder="Fecha de Venta" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Hora de Venta</label>
                        <input type="time" class="form-control" id="Descripción_cat" placeholder="Hora de Venta" required>
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
