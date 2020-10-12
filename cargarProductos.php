<?php
    include("conexion.php");
    $query="select * from producto";
    $ejecutar=mysqli_query($conexion,$query);
    $jsondata=array();
    while ($reg=mysqli_fetch_array($ejecutar)) {
        $jsondata[]=array(
            "id"=>$reg["id_producto"],
            "nombre"=>$reg["nombre"],
            "precio"=>$reg["precio"],
            "descripcion"=>$reg["descripcion"],
            "categoria"=>$reg["id_categoria"],
            "eliminado"=>$reg["eliminado"]
        );
    }
    $json=json_encode($jsondata);
    echo $json;
?>