<?php
include_once('php/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keep it clean</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link href="css/admin.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/cleaning.ico" type="image/x-icon">


</head>
<body>

        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
          <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="admin-board.php">Actividad5</a>
          <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="navbar-nav">
            <div class="nav-item text-nowrap">
              <a class="nav-link px-3" href="entrar.php">Sign out</a>
            </div>
          </div>
        </header>
        
        <div class="container-fluid">
          <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
              <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="ordenes.php">
                      <span data-feather="file" class="align-text-bottom"></span>
                      Órdenes
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="productos.php">
                      <span data-feather="shopping-cart" class="align-text-bottom"></span>
                      Productos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="clientes.php">
                      <span data-feather="users" class="align-text-bottom"></span>
                      Clientes
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="produccion.php">
                      <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                      Producción
                    </a>
                  </li>
                </ul>            
              </div>
            </nav>
        
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Producción</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                  <div class="btn-group me-2"> 
                    <a class="btn btn-success m-1" type="button" href="productos.php">Crear nueva orden de producción</a>
                  </div> 
                </div>
              </div>
                             
              <h2>En producción</h2><br>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Fecha solicitada</th>
                      <th scope="col">Producto</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody> 
                        <?php
                        $query = "SELECT p.ID, p.fecha_solicitada, p.cantidad, d.nombre FROM ordenes_produccion p JOIN producto d ON p.ID_producto = d.ID WHERE p.status = 'activo'";
                        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        $total_rows = mysqli_num_rows($rs);
                        if($total_rows > 0){ 
                            while($rows  = mysqli_fetch_array($rs)){
                                ?>
                                <tr>
                                    <td><?php echo $rows['ID']; ?></td>
                                    <td><?php echo $rows['fecha_solicitada']; ?></td>
                                    <td><?php echo $rows['nombre']; ?></td>
                                    <td><?php echo $rows['cantidad']; ?></td> 
                                    <td>En proceso</td> 
                                </tr>
                        <?php   
                            }
                        }else{
                            ?>
                            <tr>
                                <td colspan="4">No hay órdenes de producción abiertas</td>
                            </tr>
                        <?php 
                            }
                            ?>
                    </tbody>
                </table>
              </div>

            <br><br>

            <h2>Órdenes entregadas</h2> <br>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Fecha solicitada</th>
                      <th scope="col">Producto</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Fecha entregada</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody> 
                        <?php
                        $query = "SELECT p.ID, p.fecha_solicitada, p.cantidad, p.fecha_entregada, d.nombre FROM ordenes_produccion p JOIN producto d ON p.ID_producto = d.ID WHERE p.status = 'Completado y entregado'";
                        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        $total_rows = mysqli_num_rows($rs);
                        if($total_rows > 0){ 
                            while($rows  = mysqli_fetch_array($rs)){
                                ?>
                                <tr>
                                    <td><?php echo $rows['ID']; ?></td>
                                    <td><?php echo $rows['fecha_solicitada']; ?></td>
                                    <td><?php echo $rows['nombre']; ?></td>
                                    <td><?php echo $rows['cantidad']; ?></td> 
                                    <td><?php echo $rows['fecha_entregada']; ?></td>
                                    <td>Orden entregada</td> 
                                </tr>
                        <?php   
                            }
                        }else{
                            ?>
                            <tr>
                                <td colspan="4">No hay órdenes de producción entregadas</td>
                            </tr>
                        <?php 
                            }
                            ?>
                    </tbody>
                </table>
              </div>


            </main>
          </div>
        </div>
        
        
            <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        
              <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="js/dashboard.js"></script>
          

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>
</html>