<?php
    
    include("conexion.php");
 
    $tipoDeABM=$_POST['tipoABM'];
    $nombre=$_POST['nombre'];
    
    if ($tipoDeABM=="producto") {
        $precio=$_POST['precio'];
        $descripcion=$_POST['descripcion'];
        $idCategoria=$_POST['idcategoria'];
        $idProveedor=$_POST['idproveedor'];
        $queryProd="insert into $tipoDeABM (id_producto, nombre, precio, descripcion, id_categoria, id_proveedor, eliminado) 
        values (null, '$nombre', '$precio', '$descripcion', '$idCategoria', '$idProveedor', 0)";
        $ejecutarEditarProd=mysqli_query($conexion,$queryProd);
        
    }else if ($tipoDeABM=="categoria") {
        $queryCate= "insert into $tipoDeABM (id_categoria, nombre, eliminado) 
        values (null, '$nombre', 0)";
        $ejecutarEditarCate=mysqli_query($conexion,$queryCate);
    }else {
        $direccion=$_POST['direccion'];
        $cuit=$_POST['cuit'];
        $queryProv = "insert into $tipoDeABM (id_proveedor, nombre, direccion, eliminado, cuit) 
        values (null, '$nombre', '$direccion', 0, '$cuit')";
        $ejecutarEditarProv=mysqli_query($conexion,$queryProv);
    }
    
    echo " salgo de agregar.php";
    
?>