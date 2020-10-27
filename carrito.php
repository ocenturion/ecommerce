<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Carrito</title>
</head>
<body>
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
</table>

</body>
</html>
<script>
    function verificarTablaVacia(carroArray){
        if(carroArray == null){
            return true;
        }
        else{
            return false;
        }
    }

    function llenarTabla(){
        var carroArray=JSON.parse(localStorage.getItem("carro"));
        console.log(carroArray);
        if(verificarTablaVacia(carroArray)){
            document.getElementById("alerta").innerHTML=`
            <div class="alert alert-warning" role="alert">
                Carrito vacio
            </div>
            `;
        }
        else{
            console.log(carroArray);
            for(let index = 0;index < carroArray.length; index++){
                console.log(carroArray[index].id, carroArray[index].nombre);
                document.getElementById("columnaProductos").innerHTML+=`
                <tr>
                    <td>${carroArray[index].nombre}</td>
                    <td>${carroArray[index].id}</td>
                    <td>$ ${carroArray[index].precio}</td>
                </tr>
                `
            }
        }
    };
    llenarTabla();
</script>