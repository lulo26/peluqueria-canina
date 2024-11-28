console.log("hello world");
let agregarProducto = document.getElementById("agregarProducto");
let btnModalProducto = document.getElementById("btnModalProducto");

//traer los productos
fetch(base_url + "/productos/traerProductos")
    .then((res) => res.json())
    .then((data) => { 
        Object.values(data).forEach((producto) => {
          console.log(producto.imagen_productos);
          
            document.getElementById("cardProductos").innerHTML += `<div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="${producto.imagen_productos}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">${producto.nombreProducto}</h5>
                                    <!-- Product price-->
                                    ${producto.precio}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">agregar al carrito</a></div>
                            </div>
                        </div>
                    </div>`
        });
    })


  /*  btnModalProducto.addEventListener('click', ()=>{
      console.log("click");
      
     // $('#agregarProducto').modal('show')
  })*/



