<?php

    include("conexion.php");

    $tipoDeABM=$_POST['tipoABM'];
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];

    if ($tipoDeABM=="producto") {
        $precio=$_POST['precio'];
        $descripcion=$_POST['descripcion'];
        $idcategoria=$_POST['idcategoria'];
        $idproveedor=$_POST['idproveedor'];
        $query="update $tipoDeABM set nombre = $nombre, precio = $precio, descripcion = $descripcion, id_categoria = $idcategoria
        id_proveedor = $idproveedor where id_producto=$id";
        echo $precio;
        
    }else if ($tipoDeABM=="categoria") {
        $idcategoria=$_POST['idcategoria'];

        $query= "update $tipoDeABM set nombre = $nombre where id_categoria=$id";
        
    }else {
        $idproveedor=$_POST['idproveedor'];
        $direccion=$_POST['direccion'];
        $cuit=$_POST['cuit'];
        $query = "update $tipoDeABM set nombre = $nombre, direccion = $direccion, cuit = $cuit where id_proveedor=$id";
    }
    $ejecutarEditarProd=mysqli_query($conexion,$query);
    echo "salgo de editar.php";
    
?>