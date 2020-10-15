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
            background-color:#f0f2f4;
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
                <div class="list-group mt-3">
                    <a class="list-group-item list-group-item-action" data-toggle="list" onclick="mostrarTabla('abmProductos')">ABM Productos</a>
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
            /* document.getElementById('btnAgregar').style.visibility="visible"; */
            if (abm==="abmProductos") {
                document.getElementById('tituloDelAbm').innerHTML="ABM Productos";
                document.getElementById('btnAgregarPadre').innerHTML='<button id="btnAgregar" type="button" onclick="onclick_btnAgregar(btnAgregar)" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"></button>';
                document.getElementById('btnAgregar').innerHTML="Agregar Productos";
                document.getElementById('tableHead').innerHTML=`
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Precio</th>
                                                                <th>Descripcion</th>
                                                                <th>Categoría</th>
                                                                <th>Proveedor</th>
                                                                <th>Editar</th>
                                                                <th>Eliminado</th>
                `;
            }else if (abm==="abmCategorías"){
                document.getElementById('tituloDelAbm').innerHTML="ABM Categorías";
                document.getElementById('btnAgregar').innerHTML="Agregar Categoría";
                document.getElementById('tableHead').innerHTML=`
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Editar</th>
                                                                <th>Eliminado</th>
                `;
            }else if (abm==="abmProveedores"){
                document.getElementById('tituloDelAbm').innerHTML="ABM Proveedores";
                document.getElementById('btnAgregar').innerHTML="Agregar Proveedor";
                document.getElementById('tableHead').innerHTML=`
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Direccion</th>
                                                                <th>Cuit</th>
                                                                <th>Editar</th>
                                                                <th>Eliminado</th>
                `;
            }else if (abm==="Reportes"){
                document.getElementById('tituloDelAbm').innerHTML="Reportes";
                document.getElementById('tableHead').innerHTML=`
                                                                <th>Nombre</th>
                                                                <th>Eliminado</th>
                `;
            }else{
                document.getElementById('tituloDelAbm').innerHTML="Mis datos";
                document.getElementById('tableHead').innerHTML=`
                                                                <th>Nombre</th>
                                                                <th>Eliminado</th>
                `;
            }  
            
            let tipoDeConsulta = abm;

            data = {"tipoDeConsulta": tipoDeConsulta};
            $.ajax({
                type:"POST",
                dateType:"json",
                url:"traerABM.php",
                data:data,
                success:function(respuesta){
                    let respuesta2=JSON.parse(respuesta);
                    let llenarTabla='';
                    if (tipoDeConsulta=='abmProductos') {
                        
                        respuesta2.forEach(element => {
                            llenarTabla+=`
                            <tr>
                                <td>${element.id}</td>
                                <td>${element.nombre}</td>
                                <td>$ ${element.precio}</td>
                                <td>${element.descripcion}</td>
                                <td>${element.categoria}</td>
                                <td>${element.proveedor}</td>
                                <td>
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" onclick="onclick_btnEditar()">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg>
                                    </button>
                                </td>
                              <td><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="onclick_btnEliminar()">Eliminar</button></td>
                            </tr>
                            `;
                        })
                    }else if(tipoDeConsulta=='abmCategorías'){
                        respuesta2.forEach(element => {
                        llenarTabla+=`
                        <tr>
                            <td>${element.id}</td>
                            <td>${element.nombre}</td>
                            <td>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" onclick="onclick_btnEditar()">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </button>
                            </td>
                          <td><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="onclick_btnEliminar()">Eliminar</button></td>
                        </tr>
                        `;
                    });
                    }else if(tipoDeConsulta=='abmProveedores'){
                        respuesta2.forEach(element => {
                        llenarTabla+=`
                        <tr>
                            <td>${element.id}</td>
                            <td>${element.nombre}</td>
                            <td>${element.direccion}</td>
                            <td>${element.cuit}</td>
                            <td>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" onclick="onclick_btnEditar()">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </button>
                            </td>
                          <td><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="onclick_btnEliminar()">Eliminar</button></td>
                        </tr>
                        `;
                    });
                    }
                    document.getElementById('tableBody').innerHTML=llenarTabla;
                }
            })
        }
        function onclick_btnAgregar(btnAgregar){
            document.getElementById('tituloModal').innerHTML="Agregar";
        }
        function onclick_btnEditar(btnAgregar){
            document.getElementById('tituloModal').innerHTML="Editar";
        }
        function onclick_btnEliminar(btnAgregar){
            document.getElementById('tituloModal').innerHTML="Eliminar";
        }
    </script>
</body>
</html>