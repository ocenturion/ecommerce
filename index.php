<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Ecommerce</title>
</head>
<body>
    <?php include("menu.php")?>

    <div class="jumbotron jumbotron-fluid" style="background-color: #FFDFC2">
      <div class="container">
        <h1 class="display-4">Verduleria "Los Bolis"</h1>
        <p class="lead">La banana que te gusta, al mejor precio!</p>
      </div>
    </div>

    <?php include("listarProductos.php")?>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
      $.ajax({
          type:"POST",
          dateType:"json",
          url:"cargarProductos.php",
          success:function(respuesta){
            let respuesta2=JSON.parse(respuesta);
            let producto='';
            respuesta2.forEach(elemento => {
              producto+=`
              <div class="col-12 col-md-3 mb-3 ml-md-3">
                <div class="card mx-auto" style="width: 18rem;">
                  <img src="https://1.bp.blogspot.com/-0V5xiGGwhBc/VK0My5TjBTI/AAAAAAAADxY/cQjkOOq9uqM/s1600/manzana-roja.png" class="card-img-top" alt="...">
                  <div class="card-body">
                        <h2>${elemento.nombre}</h2>
                        <h5>$ ${elemento.precio}</h5>
                    <p class="card-text">${elemento.descripcion}</p>
                  </div>
                  <button class="cart"></button>
                </div>
              </div>
              `
            });
            document.getElementById('productos').innerHTML=producto;
          }
      });
      
      function ingresar(){
        let nombre = document.getElementById('nombre').value;
        let pass = document.getElementById("pass").value;

        data = {"nombre": nombre, "pass": pass};
        $.ajax({
          type:"POST",
          dataType: "json",
          url: "login.php",
          data: data,
          success: function(e){
            console.log(e); 
            if (e==1) {
              window.location="adminEcommerce.php";
            } 
          }
        })
      }
      
    </script>
    
</body>
</html>