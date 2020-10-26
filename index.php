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
		listarProductos();
		function listarProductos(){
      $.ajax({
          type:"POST",
          dateType:"json",
          url:"cargarProductos.php",
          success:function(respuesta){
            let respuesta2=JSON.parse(respuesta);
			let producto='';
			let valor="";
			let clase = '';
            respuesta2.forEach(elemento => {
				if (JSON.parse(localStorage.getItem("carro"))) {
        		  for (let index = 0;index < JSON.parse(localStorage.getItem("carro")).length;index++) {
					  
        		    if (elemento.id === JSON.parse(localStorage.getItem("carro"))[index].id) {
						clase = 'class="btn btn-warning btn-block text-left"';
						valor="Producto ya agregado";
						break;
        		    }else{
						clase = 'class="btn btn-link btn-block text-left"'; 
						valor="Agregar al carrito";
					}
        		  }
        		}else{
					clase = 'class="btn btn-link btn-block text-left"'; 
					valor="Agregar al carrito";
				}
              let esunjson=JSON.stringify(elemento);
              producto+=`
              <div class="col-12 col-md-3 mb-3 ml-md-5 mr-md-2">
                <div class="card mx-auto" style="width: 18rem;">
                  <img src="https://1.bp.blogspot.com/-0V5xiGGwhBc/VK0My5TjBTI/AAAAAAAADxY/cQjkOOq9uqM/s1600/manzana-roja.png" class="card-img-top" alt="...">
                  <div class="card-body">
                        <h2>${elemento.nombre}</h2>
                        <h5>$ ${elemento.precio}</h5>
                    <p class="card-text">${elemento.descripcion}</p>
                  </div>
                  <button id="btncarrito${elemento.id}" ${clase} onclick='agregarAlCarrito(${esunjson})'>
                  	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
					  <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
					</svg>
                  ${valor}</button>
                </div>
              </div>
              `
            });

            document.getElementById('productos').innerHTML=producto;
          }
	  });
	}
      
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
      function agregarAlCarrito(elemento){
        
        let carroArray = [];
        if (JSON.parse(localStorage.getItem("carro"))) {
			carroArray = JSON.parse(localStorage.getItem("carro"));
			console.log(JSON.parse(localStorage.getItem("carro")).length);
			for (let index = 0;index < JSON.parse(localStorage.getItem("carro")).length;index++) {	  
				if (elemento.id === JSON.parse(localStorage.getItem("carro"))[index].id) {
          if (index < JSON.parse(localStorage.getItem("carro")).length) {
            console.log("elimino el producto del carro");
					  carroArray.splice(index, 1);
					  localStorage.setItem("carro", JSON.stringify(carroArray));
					  if(JSON.parse(localStorage.getItem("carro")).length==0){
						localStorage.clear();
						console.log("elimino el carro");
					  }
					break;
          }
					
				}else{
					carroArray.push(elemento);
					localStorage.setItem("carro", JSON.stringify(carroArray));
					console.log("1-agrego el producto del carro");
					/* break; */
				}
			}
        } else {
		  	carroArray = [];
		  	carroArray.push(elemento);
			localStorage.setItem("carro", JSON.stringify(carroArray));
			console.log("2-agrego el producto del carro");
        }
		listarProductos();
      }
    </script>
</body>
</html>