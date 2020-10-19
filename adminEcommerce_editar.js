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
                          <select class="custom-select" id="inputGroupSelect01">
                            ${categorias}
                          </select>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Categoría</label>
                          </div>
                          <select class="custom-select" id="inputGroupSelect02">
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
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        `;
    } else if (tipoABM == "Proveedor") {
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