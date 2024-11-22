console.log("hello world");

//traer los productos

fetch(base_url + "/productos/traerProductos")
    .then((res) => res.json())
    .then((data) => {
        data.forEach((producto) => {
            document.getElementById("cardProductos").innerHTML += `<div class="col-sm-3"><div class="card" style="width: 18rem;">
  <img src="${producto.imagen_productos}" class="card-img-top">
  <div class="card-body">
  <h5 class="card-title">${producto.nombreProducto}</h5>
    <p class="card-text">$ ${producto.precio} <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#modalTienda"><i="fas fa-shopping-cart">
</button></p>

  </div>
</div></div>`
        });
    })





