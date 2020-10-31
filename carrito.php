<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Carrito</title>
    <style>
        .container-fluid {
            padding: 0;
        }

        .row {
            margin: 0;
        }

        .col-7 {
            padding: 0;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-7">
            <div id="alerta"></div>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cant.</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody id="columnaProductos">
                    </tbody>
                    <tfoot align="right">
                        <tr>
                            <td></td>
                            <td class="bg-primary">Total</td>
                            <td align="left" class="bg-primary" id="precioTotal">$</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-12 col-lg-5">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Medios de pago</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Seleccione una opcion</h6>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Sexo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                MercadoPago
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3"
                                value="option2">
                            <label class="form-check-label" for="exampleRadios3">
                                Tarjeta de Crédito
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4"
                                value="option2">
                            <label class="form-check-label" for="exampleRadios4">
                                Tarjeta de Débito
                            </label>
                        </div>
                        <div>
                            <button class="btn btn-secondary">Cancelar</button>
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Finalizar compra</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("carrito-modal.php")?>
</body>

</html>
<script>
    function verificarTablaVacia(carroArray) {
        if (carroArray == null) {
            return true;
        }
        else {
            return false;
        }
    }

    function llenarTabla() {
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
                document.getElementById("columnaProductos").innerHTML += `
                <tr>
                    <td>${carroArray[index].nombre}</td>
                    <td>${carroArray[index].id}</td>
                    <td>$ ${carroArray[index].precio}</td>
                </tr>
                `;
                total += parseInt(carroArray[index].precio);
            }
            document.getElementById("precioTotal").innerHTML = '$ ' + total;
        }
    };
    llenarTabla();
</script>