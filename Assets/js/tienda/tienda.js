console.log("hello world");
let agregarProducto = document.getElementById("agregarProducto");
let btnModalProducto = document.getElementById("btnModalProducto");

//traer los productos

fetch(base_url + "/productos/traerProductos")
    .then((res) => res.json())
    .then((data) => {
        data.forEach((producto) => {
            document.getElementById("cardProductos").innerHTML += `<div class="col-sm-3"><div class="card" style="width: 18rem;">
  <img src="${producto.imagen_productos}" class="card-img-top">
  <div class="card-body">
  <h5 class="card-title">${producto.nombreProducto}</h5>
    <p class="card-text">$ ${producto.precioProducto} <button type="button" class="btn btn-primary btn-circle" id="btnModalProducto" data-toggle="modal" data-target="#agregarProducto">agregar</button></p>

  </div>
</div></div>`
        });
    })


    btnModalProducto.addEventListener('click', ()=>{
      console.log("click");
      
     // $('#agregarProducto').modal('show')
  })



