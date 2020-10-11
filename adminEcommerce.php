<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>AdminEcommerce</title>
    <style>
        html,body{
            height:100%;
        }
        .ricardoArjona, .row{
            height:100%;
        }
    </style>
</head>
<body>
    <?php include("menuAdmin.php")?>

    <div class="container-fluid ricardoArjona">
        <div class="row">
            <div class="col-md-3 bg-secondary text-light">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action" data-toggle="list" id="abmProductos" onclick="mostrarTabla('abmProductos')">ABM Productos</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" onclick="mostrarTabla('abmCategorías')">ABM Categorías</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" onclick="mostrarTabla('abmProveedores')">ABM Proveedores</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" onclick="mostrarTabla('Reportes')">Reportes</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" onclick="mostrarTabla('Misdatos')">Mis datos</a>
                </div>
            </div>
            <div class="col-md-9">
                <?php include("abmProductos.php");?>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        function mostrarTabla(abm){  
            if (abm==="abmProductos") {
                document.getElementById('tituloDelAbm').innerHTML="ABM Productos";
            }else if (abm==="abmCategorías"){
                document.getElementById('tituloDelAbm').innerHTML="ABM Categorías";
            }else if (abm==="abmProveedores"){
                document.getElementById('tituloDelAbm').innerHTML="ABM Proveedores";
            }else if (abm==="Reportes"){
                document.getElementById('tituloDelAbm').innerHTML="Reportes";
            }else{
                document.getElementById('tituloDelAbm').innerHTML="Mis datos";
            }  
        }
    </script>
</body>
</html>