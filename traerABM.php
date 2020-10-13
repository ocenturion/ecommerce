<?php
    include("conexion.php");

    $tipoDeConsulta=$_POST['tipoDeConsulta'];
    if ($tipoDeConsulta=='abmProductos') {
       $query="select * from producto";
    }elseif ($tipoDeConsulta=='abmCategorías') {
        $query="select * from categoria";
    }elseif ($tipoDeConsulta=='abmProveedores') {
        $query="select * from proveedor";
    }elseif ($tipoDeConsulta=='Reportes') {
        //$query="";
    }else{
        //$query="";
    }
    $ejecutar=mysqli_query($conexion,$query);

    $jsondata=array();
    while ($reg=mysqli_fetch_array($ejecutar)) {
        $jsondata[]=array(
            "nombre"=>$reg["nombre"],
            "eliminado"=>$reg["eliminado"]
        );
    }
    $json=json_encode($jsondata);
    echo $json;
?>