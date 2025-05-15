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

         <a href="productos.html">

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

        <button class="btn btn-primary" data-toggle="modal" data-target="#AgregarProducto">
          Agregar Productos
        </button>


        <div class="box-body">

          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Clave</th>
                <th>Nombre del Producto</th>
                <th>Descripción</th>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Precio de Compra</th>
                <th>Precio de Venta</th>
                <th>Unidad de Medida</th>
                <th>Stock</th>
                <th>Fecha de Ingreso</th>
                <th>Fecha de Caducidad</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>TAL-600W</td>
                <td>Taladro Eléctrico 600W</td>
                <td>Taladro con velocidad variable y función percutora</td>
                <td>Herramientas Electricas</td>
                <td>Bosch</td>
                <td>1,200.00</td>
                <td>1,650.00</td>
                <td>Pieza</td>
                <td>8</td>
                <td>2025-03-26</td>
                <td>N/A</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>MART-16OZ</td>
                <td>Martillo de Uña 16 oz</td>
                <td>Martillo de acero con mango de goma antideslizante</td>
                <td>Herramientas Manuales</td>
                <td>Truper</td>
                <td>80.00</td>
                <td>120.00	</td>
                <td>Pieza</td>
                <td>15</td>
                <td>2025-03-26</td>
                <td>N/A</td>

                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>TUB-PVC12</td>
                <td>Tubería PVC 1/2" (3m)</td>
                <td>Tubo de PVC para conducción de agua potable</td>
                <td>Fontaneria</td>
                <td>Rotoplas</td>
                <td>60.00</td>
                <td>90.00</td>
                <td>Metro</td>
                <td>30</td>
                <td>2025-03-26</td>
                <td>N/A</td>
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
                <h3 class="modal-title" id="modalLabel"> Registrar Producto</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="formRegistroCategoria">
                    <div class="form-group">
                        <label for="categoria">Clave del Producto</label>
                        <input type="text" class="form-control" id="categoria" placeholder="Ingrese la Categoria" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Nombre del Producto</label>
                        <input type="text" class="form-control" id="Descripción_cat" placeholder="Ingrese El Nombre del Producto" required>
                    </div>
                    <div class="form-group">
                      <label for="descripcion">Descripción</label>
                      <input type="text" class="form-control" id="Descripción_cat" placeholder="Ingrese una Descripción" required>
                  </div>
                  <div class="form-group">
                    <label for="rol">Categoria</label>
                    <select class="form-control" id="rol">
                        <option value="admin">Herramientas Manuales</option>
                        <option value="cajero">Herramientas Electricas</option>
                        <option value="almacenista">Fontaneria</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="descripcion">Marca</label>
                  <input type="text" class="form-control" id="Descripción_cat" placeholder="Ingrese la Marca" required>
              </div>
              <div class="form-group">
                <label for="descripcion">Precio de Venta</label>
                <input type="number" class="form-control" id="Descripción_cat" placeholder="Ingrese El Precio de Venta" required>
            </div>
            <div class="form-group">
              <label for="descripcion">Precio de Compra </label>
              <input type="number" class="form-control" id="Descripción_cat" placeholder="Ingrese El Precio de Compra" required>
            </div>
            <div class="form-group">
              <label for="descripcion">Unidad de Medida</label>
              <input type="text" class="form-control" id="Descripción_cat" placeholder="Ingrese la Unidad de Medida" required>
            </div>
            <div class="form-group">
              <label for="descripcion">Stock</label>
              <input type="number" class="form-control" id="Descripción_cat" placeholder="Ingrese el Stock" required>
          </div>
          <div class="form-group">
            <label for="descripcion">Fecha de Ingreso</label>
            <input type="date" class="form-control" id="Descripción_cat" placeholder="Fecha de Ingreso" required>
          </div>
          <div class="form-group">
            <label for="descripcion">Fecha de Caducidad</label>
            <input type="text" class="form-control" id="Descripción_cat" placeholder="Fecha de Caducidad" required>
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
