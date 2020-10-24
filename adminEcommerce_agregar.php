<?php
    
    include("conexion.php");
 
    $tipoDeABM=$_POST['tipoABM'];
    $nombre=$_POST['nombre'];
    
    if ($tipoDeABM=="producto") {
        $precio=$_POST['precio'];
        $descripcion=$_POST['descripcion'];
        $idcategoria=$_POST['idcategoria'];
        $idproveedor=$_POST['idproveedor'];
        $queryProd="insert into $tipoDeABM value (null,'$nombre', '$precio', '$descripcion', '$idcategoria','$idproveedor')";
        $ejecutarEditarProd=mysqli_query($conexion,$queryProd);
        
    }else if ($tipoDeABM=="categoria") {
        $queryCate= "insert into $tipoDeABM value (null,'$nombre')";
        $ejecutarEditarCate=mysqli_query($conexion,$queryCate);
    }else {
        $direccion=$_POST['direccion'];
        $cuit=$_POST['cuit'];
        $queryProv = "insert into $tipoDeABM value (null,'$nombre', '$direccion', '$cuit')";
        $ejecutarEditarProv=mysqli_query($conexion,$queryProv);
    }
    
    echo " salgo de agregar.php";
    
?>