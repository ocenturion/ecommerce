<?php

    include("conexion.php");

    $id=$_POST['id'];
    $tipoDeABM=$_POST['tipoABM'];

    if ($tipoDeABM=="producto") {
        echo "entre a producto";
        echo "update $tipoDeABM set nombre = nombre, precio = precio, descripcion = descripcion, id_categoria = id_categoria
        id_proveedor = id_proveedor where id_producto=$id";

        $queryEliminarProd="update $tipoDeABM set eliminado=1 where id_producto=$id";
        $ejecutarEliminarProd=mysqli_query($conexion,$queryEliminarProd);
    }else if ($tipoDeABM=="categoria") {
        # code...
        $idRelacion="id_".$tipoDeABM;

        $query= "update $tipoDeABM set nombre = nombre where id_categoria=$id";
        
        $ejecutar=mysqli_query($conexion,$query);
        if(mysqli_num_rows($ejecutar)==0)
        {
            $query2="update $tipoDeABM set eliminado=1 where $idRelacion=$id";
            
            $ejecutar2=mysqli_query($conexion,$query2);
        }
    }else {
        $query = "update $tipoDeABM set nombre = nombre, direccion = direccion, cuit = cuit where id_proveedor=$id";
    }
    echo "salgo de eliminar.php";
    
?>