console.log("hello world");

//traer los productos

fetch(base_url + "/productos/traerProductos")
    .then((res) => res.json())
    .then((data) => {
        data.forEach((producto) => {
            document.getElementById("cardProductos").innerHTML += `<div class="card" style="width: 18rem;">
  <img src="" class="card-img-top">
  <div class="card-body">
    <p class="card-text">${producto.nombreProducto}</p>
  </div>
</div>`
        });
    })





