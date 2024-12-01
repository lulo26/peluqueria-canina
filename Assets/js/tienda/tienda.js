console.log("hello world");


//traer los productos
fetch(base_url + "/tienda/listarProductos")
  .then((res) => res.json())
  .then((data) => { 
    data = data.data
    data.forEach((producto) => {
      console.log(producto)
      document.getElementById(
        "cardProductos"
      ).innerHTML += `<div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="${base_url}/${producto.imagen_productos}" alt="..." />
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
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="${base_url+'/tienda/productoTienda/'+producto.idInventario}">más información</a></div>
                            </div>
                        </div>
                    </div>`;
    });
  });