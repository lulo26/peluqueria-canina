console.log("hello world");


//traer los productos
fetch(base_url + "/carrito/listarCarrito")
  .then((res) => res.json())
  .then((data) => { 
    data = data.data
    data.forEach((producto) => {
      console.log(producto)
      document.getElementById("printCart").innerHTML += `<div class="card mb-3" style="max-width: 80%; ">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="${base_url}/${producto.imagen_productos}" class="card-img-left rounded-start " alt="..." width="200" height="200">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">${producto.nombreProducto}</h5>
        <p class="card-text">$${producto.precio}</p>
      </div>
    </div>
  </div>
</div>`;
    });
  });

/*<div class="col mb-5">
        <div class="card h-100">
            <!-- Product image-->
            <img class="card-img-top" src="${base_url}/${producto.imagen_productos}" alt="..." width="100" height="100"/>
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
            </div>
        </div>
    </div>*/

  /**/