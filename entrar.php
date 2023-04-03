<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keep it clean</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link href="css/entrar.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/cleaning.ico" type="image/x-icon">


</head>

<body class="text-center">

    
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Actividad5</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="admin-board.php"></a>
                </li>
              </ul>
              <div class="d-flex">
                  <a class="btn btn-outline-success m-1" href="registro.php" role="button">Registrarme</a>
              </div>
                              
            </div>
          </div>
        </nav>
    </header>

 
      <main class="form-signin w-100 m-auto">
          <form id="form-login" method="post" action="php/operaciones.php">
            <img class="mb-4" src="img/cleaning.png" alt="" width="82" height="80">
            <h1 class="h3 mb-3 fw-normal">Ingresar</h1>
        
            <div class="form-floating">
              <input type="email" class="form-control" id="correo_login" name="login_correo">
              <label for="correo_login">Correo electrónico</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" id="clave_login" name="login_clave">
              <label for="clave_login">Clave</label>
            </div>
            <input type="submit" class="w-100 btn btn-success" id="id_login" name="login" value="Entrar">
            <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
          </form>
      </main>
        
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    
    
</body>

</html>