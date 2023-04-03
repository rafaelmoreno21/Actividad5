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
                    <a class="nav-link active" href="user-board.php">
                      <span data-feather="file" class="align-text-bottom"></span>
                      Productos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="carrito.php">
                      <span data-feather="shopping-cart" class="align-text-bottom"></span>
                      Carrito
                    </a>
                  </li>
                </ul>            
              </div>
            </nav>
        
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Productos</h1>
              </div>


              <div class="container">

                <div class="alert alert-success" role="alert"> 
                    <?php echo $mensaje; ?>
                </div>

                <div class="row">
                <?php
                    $query = "SELECT * FROM producto";
                    $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    $total_rows = mysqli_num_rows($rs);
                    if($total_rows > 0){
                        while($rows  = mysqli_fetch_array($rs)){
                ?>
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="img/axion.jpg" class="card-img-top" alt="producto" height="317px">
                            <div class="card-body">
                                <span><?php echo $rows['nombre']; ?></span>
                                <h5 class="card-title"><?php echo $rows['costo']; ?></h5>

                                <form action="" method="post"> 

                                    <input type="hidden" name="id" id="idid" value="<?php echo $rows['ID']; ?>">
                                    <input type="hidden" name="nombre" id="idnombre" value="<?php echo $rows['nombre']; ?>">
                                    <input type="hidden" name="costo" id="idcosto" value="<?php echo $rows['costo']; ?>">
                                    <input type="number" class="form-control" name="cant" id="idcant" value="<?php echo 1;?>"> 
                                    <br>
                                    <button type="submit" name="btnAccion" value="Agregar" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                                    </svg> Agregar al Carrito</button>

                                </form>

                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="6">No hay productos en la BD</td>
                        </tr>
                <?php 
                    }
                    ?>
                    

                </div>




              </div>
                                           
            </main>
          </div>
        </div>
        
        
            <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        
              <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="js/dashboard.js"></script>
          

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>
</html>