const frmProductos = document.querySelector('#frmProductos')

frmProductos.addEventListener('submit', (e)=>{
    e.preventDefault()
    frmData = new FormData(frmProductos)
    fetch(base_url + '/inventario/setProducto',{
        method: "POST",
        body: frmData
    })
    .then((res)=>Swal.fire({
        title: res.status? 'Correcto' : 'Error',
        text: res.msg,
        icon: res.status ? "success" : 'error'
      }))
})

Swal.fire({
    title: 'hola',
    text: 'res.msg',
    icon: "success"
  })
