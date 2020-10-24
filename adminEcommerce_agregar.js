function onclick_btnAgregar(tipoABM){
    document.getElementById('tituloAgregar').innerHTML="Agregar " +tipoABM;
    if (tipoABM=="producto") {
        document.getElementById('bodyAgregar').innerHTML=` 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <p>Vista previa</p>
                        <div class="card mx-auto" style="width: 18rem;">
                        <img src="https://1.bp.blogspot.com/-0V5xiGGwhBc/VK0My5TjBTI/AAAAAAAADxY/cQjkOOq9uqM/s1600/manzana-roja.png" class="card-img-top" alt="...">
                        <div class="card-body">
                                <h2 id="vp_Nombre"></h2>
                                <h5 id="vp_Precio">$ </h5>
                                <p  id="vp_Descripcion"class="card-text"></p>
                        </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                        </div>
                        <input onkeyup="llenarVistaPrevia('vp_Nombre','agregarNombre')" id="agregarNombre" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Precio</span>
                        </div>
                        <input onkeyup="llenarVistaPrevia('vp_Precio','agregarPrecio')" id="agregarPrecio" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Descripción</span>
                        </div>
                        <input onkeyup="llenarVistaPrevia('vp_Descripcion','agregarDescripcion')" id="agregarDescripcion" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Categoría</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Proveedor</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                              <label class="custom-file-label" for="inputGroupFile04">Imagen</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }else if(tipoABM=="categoria"){
        document.getElementById('bodyAgregar').innerHTML=` 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                        </div>
                        <input onkeyup="llenarVistaPrevia('vp_Nombre','agregarNombre')" id="agregarNombre" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        `;
    }else if(tipoABM=="Proveedor"){
        document.getElementById('bodyAgregar').innerHTML=` 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                            </div>
                            <input onkeyup="llenarVistaPrevia('vp_Nombre','agregarNombre')" id="agregarNombre" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Dirección</span>
                            </div>
                            <input onkeyup="llenarVistaPrevia('vp_Nombre','agregarNombre')" id="agregarNombre" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Cuit</span>
                            </div>
                            <input onkeyup="llenarVistaPrevia('vp_Nombre','agregarNombre')" id="agregarNombre" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        `;
    }
}
function agregarRegistro(tipoABM){
         
    tipoABM=tipoABM.toLowerCase();
    
    if (tipoABM=="producto") {
        let nombreProducto=document.getElementById('editarNombre').value;
        let precioProducto=document.getElementById('editarPrecio').value;
        let descripcionProducto=document.getElementById('editarDescripcion').value;
        let idProveedor=document.getElementById('editarProveedor').value;
        let idCategoria=document.getElementById('editarCategoria').value;
        data = {"tipoABM": tipoABM, "nombre":nombreProducto, "precio":precioProducto,"descripcion":descripcionProducto,"idproveedor":idProveedor,"idcategoria":idCategoria};
        
    }else if (tipoABM=="categoria") {
        let nombreCategoria=document.getElementById('editarNombreCategoria').value;
        data = {"tipoABM": tipoABM, "nombre":nombreCategoria};
        
    }else if (tipoABM=="proveedor") {
        let nombreProveedor=document.getElementById('editarNombreProveedor').value;
        let direccionProveedor=document.getElementById('editarDireccion').value;
        let cuitProveedor=document.getElementById('editarCuit').value;
        data = {"tipoABM": tipoABM, "nombre":nombreProveedor,"direccion":direccionProveedor,"cuit":cuitProveedor};
        
    }
    console.log(data,tipoABM);
    $.ajax({
        type:"POST",
        url:"adminEcommerce_agregar.php",
        data:data,
        success:function(respuesta){
            if (tipoABM=="producto") {
                mostrarTabla("abmProductos");
                console.log(respuesta);    
            }else if(tipoABM=="categoria"){
                mostrarTabla("abmCategorías");
                console.log(respuesta); 
            }else if(tipoABM=="proveedor"){
                mostrarTabla("abmProveedores");
                console.log(respuesta); 
            }
        }
    })  
}