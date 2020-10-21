function onclick_btnEditar(tipoABM, id, nombre, precio, descripcion, direccion, cuit, idCategoria, idProveedor) {
    let categorias='';
    let proveedores='';
    cargarCategoria.forEach(element => {
        if (idCategoria==element.id) {
            categorias+= `
                <option value="${element.id}" selected>${element.nombre}</option>
            `;
        }else{
            categorias+= `
                <option value="${element.id}" >${element.nombre}</option>
            `;
        }
    });
    cargarProveedor.forEach(element => {
        if (idProveedor==element.id) {
            proveedores+= `
                <option value="${element.id}" selected>${element.nombre}</option>
            `;
        }else{
            proveedores+= `
                <option value="${element.id}">${element.nombre}</option>
            `;
        }
        
    });
    console.log(categorias);
    document.getElementById('tituloModificar').innerHTML = "Editar " + tipoABM;
    if (tipoABM == "Producto") {
        document.getElementById('btnEditarCancelar').innerHTML =`
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarCambios('${tipoABM}')">Guardar Cambios</button>
        `;
        document.getElementById('bodyModificar').innerHTML = ` 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <p>Vista previa</p>
                        <div class="card mx-auto" style="width: 18rem;">
                        <img src="https://1.bp.blogspot.com/-0V5xiGGwhBc/VK0My5TjBTI/AAAAAAAADxY/cQjkOOq9uqM/s1600/manzana-roja.png" class="card-img-top" alt="...">
                        <div class="card-body">
                                <h2 id="vp_Nombre">${nombre}</h2>
                                <h5 id="vp_Precio">$ ${precio}</h5>
                                <p  id="vp_Descripcion"class="card-text">${descripcion}</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                        </div>
                        <input onkeyup="llenarVistaPrevia('vp_Nombre','editarNombre')" id="editarNombre" value="${nombre}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        <input id="tipoABMProducto" value="${tipoABM}" type="hidden">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Precio</span>
                        </div>
                        <input onkeyup="llenarVistaPrevia('vp_Precio','editarPrecio')" id="editarPrecio" value="${precio}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Descripción</span>
                        </div>
                        <input onkeyup="llenarVistaPrevia('vp_Descripcion','editarDescripcion')" id="editarDescripcion" value="${descripcion}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Categoría</label>
                          </div>
                          <select class="custom-select" id="editarCategoria">
                            ${categorias}
                          </select>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Proveedor</label>
                          </div>
                          <select class="custom-select" id="editarProveedor">
                            ${proveedores}
                          </select>
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
    } else if (tipoABM == "Categoria") {
        document.getElementById('btnEditarCancelar').innerHTML =`
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarCambios('${tipoABM}')">Guardar Cambios</button>
        `;
        document.getElementById('bodyModificar').innerHTML = ` 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                        </div>
                        <input onkeyup="llenarVistaPrevia('vp_Nombre','editarNombre')" id="editarNombre" value="${nombre}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        <input id="tipoABMCategoria" value="${tipoABM}" type="hidden">
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        `;
    } else if (tipoABM == "Proveedor") {
        document.getElementById('btnEditarCancelar').innerHTML =`
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarCambios('${tipoABM}')">Guardar Cambios</button>
        `;
        document.getElementById('bodyModificar').innerHTML = ` 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                            </div>
                            <input onkeyup="llenarVistaPrevia('vp_Nombre','editarNombre')" id="editarNombre" value="${nombre}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Dirección</span>
                            </div>
                            <input onkeyup="llenarVistaPrevia('vp_Nombre','editarNombre')" id="editarNombre" value="${direccion}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Cuit</span>
                            </div>
                            <input onkeyup="llenarVistaPrevia('vp_Nombre','editarNombre')" id="editarNombre" value="${cuit}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        `;
    }
}

/* Función que graba los cambios en la DB -> Se la llama desde el botón "Guardar Cambios" dentro del modal ABM seleccionado */
/* Se le pasa el parámetro tipoABM para saber qué modificar en la DB */
function editarCambios(tipoABM){
    let data = {"tipoABM": tipoABM, "id":id};
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"adminEcommerce.editar.php",
        data:data,
        success:
    })

    tipoABM=tipoABM.toLowerCase();
    let nombreProducto=document.getElementById('editarNombre').value;
    if (tipoABM=="producto") {
        let precioProducto=document.getElementById('editarPrecio').value;
        let descripcionProducto=document.getElementById('editarDescripcion').value;
        let idProveedor=document.getElementById('editarProveedor').value;
        let idCategoria=document.getElementById('editarCategoria').value;
        data
    }else if (tipoABM=="categoria") {
        let idCategoria=document.getElementById('editarCategoria').value;
    }else if (tipoABM=="proveedor") {
        let idProveedor=document.getElementById('editarProveedor').value;
        let direccionProveedor=document.getElementById('editarProveedor').value;
        let cuitProveedor=document.getElementById('editarProveedor').value;
    }
    
    
}