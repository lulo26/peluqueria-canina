console.log("hello world");
const idUsuario = document.querySelector("#idUsuario").value

document.addEventListener('DOMContentLoaded', e =>{
  traerProductos();
})

//let idPersona = e.target.closest('button').getAttribute('rel')
//traer los productos
function traerProductos(){
  fetch(base_url + "/carrito/listarCarrito/" + idUsuario)
  .then((res) => res.json())
  .then((data) => { 
    data.forEach((producto) => {
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
}


  document.addEventListener('click', (e)=>{
    try {
        let idCarrito = e.target.closest('button').getAttribute('rel')
        //Eliminar producto
            Swal.fire({
                title:"quitar producto del carrito",
                text:"¿Está seguro que quiere quitar este producto del carrito?",
                icon: "warning",
                showDenyButton: true,
                confirmButtonText: "Sí",
                denyButtonText: `Cancelar`
            }).then((result) => {
                if (result.isConfirmed) {
                    let frmData = new FormData()
                    frmData.append('idCarrito', idCarrito)
                    fetch(base_url + '/carrito/eliminarProductoCarrito/',{
                        method: "POST",
                        body: frmData,
                    })
                    .then((res)=>res.json())
                    .then((data)=>{
                        Swal.fire({
                            title: data.status ? 'Correcto' : 'Error',
                            text: data.msg,
                            icon: data.status ? "success" : 'error'
                        })
                        location.reload();
                    })
                  }
                });
              }catch{}
            })