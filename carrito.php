<?php
include_once('php/conexion.php');
include_once('php/operaciones.php');
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
                    <a class="nav-link" href="user-board.php">
                      <span data-feather="file" class="align-text-bottom"></span>
                      Productos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="carrito.php">
                      <span data-feather="shopping-cart" class="align-text-bottom"></span>
                      Carrito
                    </a>
                  </li>
                </ul>            
              </div>
            </nav>
        
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Carrito</h1>
              </div>

              <div class="container">
                <?php if(!empty($_SESSION['CARRITO'])){ ?>
                <table class="table table-light table-bordered">
                    <tbody>
                        <tr>
                            <th width = "40%">Nombre</th>
                            <th width = "15%" class="text-center">Cantidad</th>
                            <th width = "20%" class="text-center">Precio</th>
                            <th width = "20%" class="text-center">Total</th>
                            <th width = "5%" class="text-center">--</th>
                        </tr>
                        <?php $total = 0;?>
                        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?> 
                        <tr>
                            <td width = "40%"><?php echo $producto['nombre'] ;?></td>
                            <td width = "15%" class="text-center"><?php echo $producto['cantidad'] ;?></td>
                            <td width = "20%" class="text-center">$<?php echo $producto['costo'] ;?></td>
                            <td width = "20%" class="text-center">$<?php echo number_format($producto['costo']*$producto['cantidad'],2);?></td>

                            <form action="" method="post">

                                <input type="hidden" name="idd" value="<?php echo $producto['ID'] ;?>">

                                <td width = "5%" class="text-center"><button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button></td>
                            </form>
                           
                        </tr>
                        <?php $total = $total + ($producto['costo']*$producto['cantidad']);?>
                        <?php } ?>
                        <tr>
                            <td colspan="3" align="right"><h3>Total</h3></td>
                            <td align="right"><h3>$<?php echo number_format($total,2); ?></h3></td>
                            <td></td>
                        </tr>
                       
                    </tbody>
                    
                </table>
            <?php } else{ ?>
                <div class="alert alert-success" role="alert"> 
                    <?php echo 'No hay productos en el carrito'; ?>
                </div>
            <?php } ?>
              </div>

            <form action="php/operaciones.php" method="post">
                <input type="hidden" name="idtotal" value="<?php echo $total ;?>">
                <input type="submit" name="btn" value="Comprar" class="w-100 btn btn-success"> 

            </form>
                                           
            </main>
          </div>
        </div>
        
        
            <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        
              <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="js/dashboard.js"></script>
          

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>
</html>
