<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keep it clean</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link href="#" rel="stylesheet">
    <link rel="shortcut icon" href="img/cleaning.ico" type="image/x-icon">

</head>

<body>

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
                  <a class="btn btn-outline-success m-1" href="entrar.php" role="button">Entrar</a>
              </div>
                             
            </div>
          </div>
        </nav>
      </header>
      <br><br>

    <main>
        <div class="container">
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="img/cleaning.png" alt="" width="82" height="80">
                <h2>Registro</h2>
              </div>

              <div class="col-auto" id="form-registrar">

                <form class="row g-3" id="form-registrar2" method="post" action="php/operaciones.php">
                            
                    <div class="col-md-4">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control" id="id_cedula" name="cedula" placeholder="Ingrese su cedula" minlength="8" maxlength="9">
                    </div>
              
                    <div class="col-md-4">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="id_nombre" name="nombre" placeholder="Ingrese su nombre">
                    </div>
              
                    <div class="col-md-4">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="id_apellido" name="apellido" placeholder="Ingrese su apellido">
                    </div>
                   
                    <div class="col-md-12">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="id_direccion" name="direccion" placeholder="Ingrese su dirección">
                    </div>
              
                  <div class="col-md-6">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="text" class="form-control" id="id_correo" name="correo" placeholder="Ingrese su correo">
                  </div>
              
                  <div class="col-md-6">
                    <label for="clave" class="form-label">Clave</label>
                    <input type="password" class="form-control" id="id_clave" name="clave" placeholder="Ingrese su clave" minlength="5" maxlength="20">
                  </div>
                  
                  <br><br><br><br><br>

                  <div>
                    <input type="submit" class="btn btn-success col-12" id="id_save" name="save" value="Registrarme">
                  
                  </div>
                  
                </form>

                <br><br><br>
              
              </div>




        </div>
    </main>


         
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        
</body>

</html>