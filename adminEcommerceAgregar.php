
<?php
    
    include("conexion.php");

    $tipoDeABM=$_POST['tipoABM'];
    $nombre=$_POST['nombre'];

    if ($tipoDeABM=="producto") {
        $precio=$_POST['precio'];
        $descripcion=$_POST['descripcion'];
        $idCategoria=$_POST['idCategoria'];
        $idProveedor=$_POST['idProveedor'];
        $queryProd="insert into $tipoDeABM (id_producto, nombre, precio, descripcion, id_categoria, id_proveedor, eliminado) 
        values (null, '$nombre', '$precio', '$descripcion', '$idCategoria', '$idProveedor', 0)";
        $ejecutarAgregarProd=mysqli_query($conexion,$queryProd);
        
    }else if ($tipoDeABM=="categoria") {
        $queryCate= "insert into $tipoDeABM (id_categoria, nombre, eliminado) 
        values (null, '$nombre', 0)";
        $ejecutarAgregarCate=mysqli_query($conexion,$queryCate);
    }else {
        $direccion=$_POST['direccion'];
        $cuit=$_POST['cuit'];
        $queryProv = "insert into $tipoDeABM (id_proveedor, nombre, direccion, eliminado, cuit) 
        values (null, '$nombre', '$direccion', 0, '$cuit')";
        $ejecutarAgregarProv=mysqli_query($conexion,$queryProv);
    }

?>