<?php
    include("conexion.php");

    $tipoDeConsulta=$_POST['tipoDeConsulta'];
    if ($tipoDeConsulta=='abmProductos') {
       $query="select id_producto,
                        a.nombre,
                        a.precio,
                        a.descripcion,
                        b.nombre as 'categoria',
                        c.nombre as 'proveedor',
                        a.eliminado
                        from producto a 
                        left join categoria b on b.id_categoria=a.id_categoria
                        left join proveedor c on c.id_proveedor=a.id_proveedor
                        where a.eliminado=0";
    }elseif ($tipoDeConsulta=='abmCategorías') {
        $query="select * from categoria where eliminado=0";
    }elseif ($tipoDeConsulta=='abmProveedores') {
        $query="select * from proveedor where eliminado=0";
    }elseif ($tipoDeConsulta=='Reportes') {
        //$query="";
    }else{
        //$query="";
    }
    $ejecutar=mysqli_query($conexion,$query);

    $jsondata=array();
    while ($reg=mysqli_fetch_array($ejecutar)) {
        if ($tipoDeConsulta=='abmProductos') {
            $jsondata[]=array(
                "id"=>$reg["id_producto"],
                "nombre"=>$reg["nombre"],
                "precio"=>$reg["precio"],
                "descripcion"=>$reg["descripcion"],
                "categoria"=>$reg["categoria"],
                "proveedor"=>$reg["proveedor"],
            );
         }elseif ($tipoDeConsulta=='abmCategorías') {
            $jsondata[]=array(
                "id"=>$reg["id_categoria"],
                "nombre"=>$reg["nombre"],
            );
         }elseif ($tipoDeConsulta=='abmProveedores') {
            $jsondata[]=array(
                "id"=>$reg["id_proveedor"],
                "nombre"=>$reg["nombre"],
                "direccion"=>$reg["direccion"],
                "cuit"=>$reg["cuit"]
            );
         }elseif ($tipoDeConsulta=='Reportes') {
            
         }else{
             
         }
        
    }
    $json=json_encode($jsondata);
    echo $json;
?>