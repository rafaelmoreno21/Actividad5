<?php

include_once('conexion.php');

    //registro de usuario
    if(isset($_POST['save']) && $_POST['save'] == "Registrarme") {

        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];

        $query = "INSERT INTO usuario (cedula, nombre, apellido, direccion, correo, clave) VALUES ('$cedula', '$nombre','$apellido', '$direccion','$correo', '$clave')";

        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        if($rs == true){
            header('Location: ../index.php');
        }
        else{
            echo 'Error en el inicio';
        }

    }

    //login 
    if(isset($_POST['login']) && $_POST['login'] == "Entrar"){

        $correo = $_POST['login_correo'];
        $clave = $_POST['login_clave'];

        $query2 = "SELECT ID FROM usuario WHERE correo = '$correo' AND clave = '$clave'";
        $rs2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
        $total_rows = mysqli_num_rows($rs2);

        $id_client = 0;
        if ($row = mysqli_fetch_row($rs2)) {
            $id_client = trim($row[0]);
        }

        if ($correo == 'admin@a.com' && $clave = '1235') {
            header('Location: ../ordenes.php');
        }
        elseif ($correo == 'lab@a.com' && $clave = '12356') {
            header('Location: ../laboratorio.php');
        }
        elseif ($rs2 == true) {
            if ($total_rows > 0){
                session_start();
                if(!isset($_SESSION['cliente'])){
                    $_SESSION['cliente']= $id_client;            
                }

                header('Location: ../user-board.php');
            }
            else{
                echo 'Clave incorrecta o usuario no registrado';
            }
        }
        else{
            echo 'Error en entrar';
        }
       
    }

    //editar producto        
    if(isset($_POST['btn']) && $_POST['btn'] == 'Actualizar'){
        $id = $_POST['txtid'];
        $nombre = $_POST['txtnombre'];
        $cantidad = $_POST['txtcantidad'];
        $costo = $_POST['txtcosto'];

        $query = "UPDATE producto SET nombre ='$nombre',cantidad ='$cantidad',costo ='$costo'  WHERE ID ='$id' ";

        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if($rs == true){
            header('Location: ../productos.php');
        }
        else {
            echo 'Error con la modificación del producto';
        }
    }

    //enviar orden de producción
    if(isset($_POST['btn4']) && $_POST['btn4'] == 'Enviar'){
        $id = $_POST['txtid2'];
        $cantidad = $_POST['txtcantidad2'];

        $query = "INSERT INTO ordenes_produccion (ID_producto, cantidad, status) VALUES ('$id','$cantidad','activo')";
        
        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if($rs == true){
            header('Location: ../produccion.php');
        }
        else {
            echo 'Error con el envío de la orden';
        }
    }

    //confirmar orden de producción 
    if(isset($_GET['btn']) && $_GET['btn'] == 'si'){
   
        $id = $_GET['ID'];
        $query = "UPDATE ordenes_produccion SET status = 'Completado y entregado', fecha_entregada = CURRENT_TIMESTAMP WHERE ID ='$id'";
        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
        if($rs == true){
            $query2 = "SELECT ID_producto FROM ordenes_produccion WHERE ID ='$id'";
            $rs2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
            
            $id_produc = 0;
            if ($row = mysqli_fetch_row($rs2)) {
                $id_produc = trim($row[0]);
            }

            $query3 = "SELECT cantidad FROM producto WHERE ID = '$id_produc'";
            $rs3 = mysqli_query($conn, $query3) or die  (mysqli_error($conn));  
        
            $cant = 0;
            if ($row = mysqli_fetch_row($rs3)) {
                $cant = trim($row[0]);
            }

            $query4 = "SELECT cantidad FROM ordenes_produccion WHERE ID = '$id'";
            $rs4 = mysqli_query($conn, $query4) or die  (mysqli_error($conn));  
        
            $cant_orden = 0;
            if ($row = mysqli_fetch_row($rs4)) {
                $cant_orden = trim($row[0]);
            }

            $total = 0;
            $total = $cant + $cant_orden;

            $query5 = "UPDATE producto SET cantidad = '$total' WHERE ID = '$id_produc'";
            $rs5 = mysqli_query($conn, $query5) or die  (mysqli_error($conn));  
        
            mysqli_close($conn);
        
            if($rs5 == true){
                header('Location: ../laboratorio.php');
            }
            else {
                echo 'Error al final';
            }

          
        }

    }

    //confirmar orden entregada al cliente
    if(isset($_GET['btn']) && $_GET['btn'] == 'aceptar'){
   
        $id = $_GET['ID'];
        $query = "UPDATE ordenes_compra SET status = 'cerrada' WHERE ID = '$id'";
        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
        if($rs == true){
            header('Location: ../ordenes.php');
        }
        else {
            echo 'Error al final';
        }
          
    }

    //carrito
    session_start();

    $mensaje = "";
    $id = 0 ;

    if(isset($_POST['btnAccion']) && $_POST['btnAccion'] == 'Agregar'){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $costo = $_POST['costo'];
        $cantidad = $_POST['cant'];
        
        if(!isset($_SESSION['CARRITO'])){

            $producto = array(
                'ID' => $id,
                'nombre' => $nombre,
                'costo' => $costo,
                'cantidad' => $cantidad,
            );
            $_SESSION['CARRITO'][0] = $producto;
            $mensaje = $nombre. " fue agregado exitosamente al carrito!, fueron añadidos ".$cantidad ;
    
        }
        else {

            $idProductos = array_column($_SESSION['CARRITO'],"ID");

            if(in_array($id,$idProductos)){
                echo " <script>alert('El producto ya ha sido seleccionado!');</script>";
                $mensaje = "";
            }
            else {                    
                $numProductos = count($_SESSION['CARRITO']);
                $producto = array(
                    'ID' => $id,
                    'nombre' => $nombre,
                    'costo' => $costo,
                    'cantidad' => $cantidad,
                );
                $_SESSION['CARRITO'][$numProductos] = $producto;
                $mensaje = $nombre. " fue agregado exitosamente al carrito!, fueron añadidos ".$cantidad ;
            }
                       
        }
       
    }
    else {
        $mensaje = "Bienvenid@!";
    }

    //eliminar producto del carrito 
    if(isset($_POST['btnAccion']) && $_POST['btnAccion'] == 'Eliminar'){
        $id = $_POST['idd'];

        foreach($_SESSION['CARRITO'] as $indice=>$producto) {
            if($producto ['ID']==$id){
                unset($_SESSION['CARRITO'][$indice]);
            }
        }    
    
    }

    //comprar desde el carrito
    if(isset($_POST['btn']) && $_POST['btn'] == 'Comprar'){

        $monto = $_POST['idtotal'];
        $id_cliente = $_SESSION['cliente'];

        $query = "INSERT INTO ordenes_compra (ID_cliente, monto, status) VALUES ('$id_cliente','$monto','abierta')";

        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        if($rs == true){

            $query2 = "SELECT MAX(ID) FROM ordenes_compra";

            $rs2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
            $id = 0;
            if ($row = mysqli_fetch_row($rs2)) {
                $id = trim($row[0]);
            }
            
            foreach($_SESSION['CARRITO'] as $indice=>$producto) {
                $produc = $producto ['ID'];
                $cant = $producto ['cantidad'];

                $query3 = "INSERT INTO ordenes_producto (ID_orden, ID_producto, cantidad) VALUES ('$id','$produc','$cant')";

                $rs3 = mysqli_query($conn, $query3) or die  (mysqli_error($conn));
            
                if($rs3 == true){

                    $query4 = "SELECT cantidad FROM producto WHERE ID = '$produc'";

                    $rs4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
                    $cantidad = 0;
                    if ($row = mysqli_fetch_row($rs4)) {
                        $cantidad = trim($row[0]);
                    }

                    $cant_def = 0;
                    $cant_def = $cantidad - $cant;

                    $query5 = "UPDATE producto SET cantidad = '$cant_def' WHERE ID = '$produc'";

                    $rs5 = mysqli_query($conn, $query5) or die(mysqli_error($conn));
                 
                }
            }
                mysqli_close($conn); 
                if ($rs5 == true) {
                    unset($_SESSION['CARRITO']);
                    header('Location: ../user-board.php');
                }
                           
        }
        else{
            echo 'Error en el inicio';
        }
        
    }


    
?>