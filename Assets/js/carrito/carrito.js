console.log("hello world");


//traer los productos
fetch(base_url + "/carrito/listarCarrito/7")
  .then((res) => res.json())
  .then((data) => { 
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
        ${producto.delete}
      </div>
    </div>
  </div>
</div>`;
    });
  });

//agregar al carrito

