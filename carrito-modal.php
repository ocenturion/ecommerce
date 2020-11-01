<!-- Modal Ticket-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <!-- Header del Ticket (wrappeado en un div para que todo sea un solo bloque)-->
      <div class="modal-header" align="center">
        <h2 class="modal-title" id="exampleModalLabel">Ticket de compra</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Cuerpo del Ticket (Trae la tabla con los productos comprados)-->
      <div class="modal-body">
      <div class="container-fluid">
      <div id="datosNegocioTicket" align="center">  
          <h5 id="tituloTicketNegocio"><br>***  ***</h5>
          <h5 id="tituloTicketUbicacionNegocio">Dirección: - Localidad</h5>
          <h5><br>***** PVP IVA INCLUIDO *****</h5>
      </div>
        <div class="row">
          <div class="col-12 col-lg-12">
            <div id="alerta"></div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cant.</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody id="columnaProductosTicket">
                    </tbody>
                    <tfoot align="right">
                        <tr>
                            <td></td>
                            <td >Total</td>
                            <td align="left" id="precioTotalTicket">$</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
          </div>
        </div>
    </div>
      <!-- Footer del Ticket(Botones de cierre del modal) -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Imprimir ticket</button>
      </div>
    </div>
  </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</html>

<!-- Funciones que llenan la tabla del Modal Ticket-->
<!-- Copypaste de las functs de "carrito.php"; solo cambia el target donde se llena la columna y el nombre de la funct(columnaProductosTicket, precioTotalTicket y llenarTablaTicket)-->
<script>
    function verificarTablaVacia(carroArray) {
        if (carroArray == null) {
            return true;
        }
        else {
            return false;
        }
    }

    function llenarTablaTicket() {
        var carroArray = JSON.parse(localStorage.getItem("carro"));
        console.log(carroArray);
        if (verificarTablaVacia(carroArray)) {
            document.getElementById("alerta").innerHTML = `
            <div class="alert alert-warning" role="alert">
                Carrito vacio
            </div>
            `;
        }
        else {
            console.log(carroArray);
            let total = 0;
            for (let index = 0; index < carroArray.length; index++) {
                console.log(carroArray[index].id, carroArray[index].nombre);
                document.getElementById("columnaProductosTicket").innerHTML += `
                <tr>
                    <td>${carroArray[index].nombre}</td>
                    <td>${carroArray[index].id}</td>
                    <td>$ ${carroArray[index].precio}</td>
                </tr>
                `;
                total += parseInt(carroArray[index].precio);
            }
            document.getElementById("precioTotalTicket").innerHTML = '$ ' + total;
        }
    };

    function llenarTicketDatosDelNegocio(){
      
    };

    llenarTablaTicket();
</script>