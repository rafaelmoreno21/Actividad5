<?php

    include_once('php/conexion.php');
        
    if(isset($_GET['ID']) && !empty($_GET['ID'])){

        $id = $_GET['ID'];
        $Query = "SELECT * FROM producto WHERE ID='$id'";
        $rs    = mysqli_query($conn, $Query) or die(mysqli_error($conn));
        $conteo = mysqli_num_rows($rs);
        $fila = mysqli_fetch_array($rs);

    }
    else{
    header('location: usuarios.php'); 
    }

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
                    <a class="nav-link active" href="productos.php">
                      <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                      Productos
                    </a>
                  </li>
                </ul>            
              </div>
            </nav>
        
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Productos</h1>
              </div>
                             
              <h2>Modificación de productos</h2><br>
              
                <form action="php/operaciones.php" method="post">

                    <label for="idnombre" class="form-label">Nombre</label><br>
                    <input type="text" class="form-control" name="txtnombre" id="idnombre" value="<?php echo $fila['nombre']; ?>"> <br>
                    <label for="idcantidad" class="form-label">Cantidad</label><br>
                    <input type="text" class="form-control" name="txtcantidad" id="idcantidad" value="<?php echo $fila['cantidad']; ?>"> <br>
                    <label for="idcosto" class="form-label">Costo</label><br>
                    <input type="text" class="form-control" name="txtcosto" id="idcosto" value="<?php echo $fila['costo']; ?>"> <br>
                    <br>
                    <input type="hidden" name="txtid" id="idid" value="<?php echo $fila['ID']; ?>"> <br>
                    <input type="submit" name="btn" value="Actualizar" class="w-100 btn btn-success"> 

                </form>

            <br><br>

            </main>
          </div>
        </div>
        
        
            <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        
              <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="js/dashboard.js"></script>
          

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>
</html>