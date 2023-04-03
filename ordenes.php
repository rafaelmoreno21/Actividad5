<?php
include_once('php/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad5</title>

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
                    <a class="nav-link active" href="ordenes.php">
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
                    <a class="nav-link" href="produccion.php">
                      <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                      Producción
                    </a>
                  </li>
                </ul>            
              </div>
            </nav>
        
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Órdenes</h1>
              </div>
                             
              <h2>Órdenes abiertas</h2>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Nombre del Cliente</th>
                      <th scope="col">Monto</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php
                        $query = "SELECT o.ID, o.fecha, o.monto, u.nombre, u.apellido FROM ordenes_compra o JOIN usuario u ON o.ID_cliente = u.ID WHERE o.status = 'abierta'"; 
                        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        $total_rows = mysqli_num_rows($rs);
                        if($total_rows > 0){
                            while($rows  = mysqli_fetch_array($rs)){
                                ?>
                                <tr>
                                    <td><?php echo $rows['ID']; ?></td>
                                    <td><?php echo $rows['fecha']; ?></td>
                                    <td><?php echo $rows['nombre']." ".$rows['apellido']; ?></td>
                                    <td><?php echo $rows['monto']; ?></td> 
                                    <td><a href="ordenes.php" onClick="entregas(<?php echo $rows['ID']; ?>)" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                  </svg></a></td> 
                                </tr> 
                        <?php   
                            }
                        }else{
                            ?>
                            <tr>
                                <td colspan="4">No hay órdenes abiertas</td>
                            </tr>
                        <?php 
                            }
                            ?>
                    </tbody>
                </table>
              </div>

            <br><br>

            <h2>Órdenes cerradas</h2>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Nombre del Cliente</th>
                      <th scope="col">Monto</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php
                        $query = "SELECT o.ID, o.fecha, o.monto, u.nombre, u.apellido FROM ordenes_compra o JOIN usuario u ON o.ID_cliente = u.ID WHERE o.status = 'cerrada'"; 
                        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        $total_rows = mysqli_num_rows($rs);
                        if($total_rows > 0){ 
                            while($rows  = mysqli_fetch_array($rs)){
                                ?>
                                <tr>
                                    <td><?php echo $rows['ID']; ?></td>
                                    <td><?php echo $rows['fecha']; ?></td>
                                    <td><?php echo $rows['nombre']." ".$rows['apellido']; ?></td>
                                    <td><?php echo $rows['monto']; ?></td> 
                                </tr>
                        <?php   
                            }
                        }else{
                            ?>
                            <tr>
                                <td colspan="4">No hay órdenes cerradas</td>
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
          
              <script>
                function entregas(ID) {
                    let resp = confirm("¿Ha entregado la orden No. "+ID + "?");

                    if(resp == true){
                        let url = "php/operaciones.php?ID="+ID+"&btn=aceptar";
                        location.href = url;
                        alert("Orden entregada al cliente"); 
                    }

                }
              </script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>
</html>