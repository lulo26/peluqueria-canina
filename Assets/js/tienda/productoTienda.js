    fetch(base_url+"/tienda/selectProductosLimit")
  .then((res) => res.json())
  .then((data) => { data = data.data
    console.log(data);
    data.forEach((producto) => {
        document.getElementById("relatedCards").innerHTML += `
        <div class="col mb-5">
            <div class="card h-100">
                <!-- Product image-->
                <img class="card-img-top" src="${base_url}/${producto.imagen_productos}" alt="..." />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">${producto.nombreProducto}</h5>
                        <!-- Product price-->
                        $${producto.precio}
                    </div>
                </div>
                <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="${base_url+'/tienda/productoTienda/'+producto.idInventario}">View options</a></div>
    </div>
</div>
</div>
      
      `})
    })

//agregar al carrito
const frmCarrito = document.querySelector("#frmCarrito");
const idCarrito = document.querySelector("#idCarrito")
const idUsuario = document.querySelector("#idUsuario")
const idProducto = document.querySelector("#idProducto")
const cantidadProducto = document.querySelector("#cantidadProducto")

frmCarrito.addEventListener('submit', (e)=>{
  e.preventDefault()
  frmData = new FormData(frmCarrito)
  console.log(frmData);
  fetch(base_url + '/carrito/setProductoCarrito',{
      method: "POST",
      body: frmData
  })
  .then((res)=>res.json())
  .then((data)=>{Swal.fire({
      title: data.status ? 'Correcto' : 'Error',
      text: data.msg,
      icon: data.status ? "success" : 'error'
      })
  })
})