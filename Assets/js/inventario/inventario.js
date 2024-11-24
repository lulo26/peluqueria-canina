const btnIngresarProducto = document.querySelector('#btnIngresarProducto')
const btnEgresarProducto = document.querySelector('#btnEgresarProducto')
const inventarioModalLabel = document.querySelector('#inventarioModalLabel')
const frmInventario = document.querySelector('#frmInventario')
const nombreProductoLabel = document.querySelector('#nombreProductoLabel')
const cantidadProducto = document.querySelector('#cantidadProducto')
const inventarioSumaResta = document.querySelector('#inventarioSumaResta')
const idProducto = document.querySelector('#idProducto')

var selected;

tablaInventario = $('#tablaInventario').dataTable({
    "language": {
        "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
    },
    "ajax":{
        "url": " "+base_url+"/inventario/getInventario",
        "dataSrc":""
    },
    "columns":[
        {"data":"nombreProducto"},
        {"data":"cantidadProducto"},
        {"data":"codigoSKU"},
        {"data":"options"}
    ],
    "responsive": "true",
    "iDisplayLength": 10,
    "order":[[0, "asc"]]
}) 

document.addEventListener('click', (e)=>{

    try {
        selected = e.target.closest('button').getAttribute('data-action-type')
        let frmIdProducto = e.target.closest('button').getAttribute('rel')

        if (selected == 'sumar') {
            frmInventario.reset()
            inventarioModalLabel.innerHTML = 'Ingresar Producto'
            inventarioSumaResta.value = 'suma'
            idProducto.value = frmIdProducto 
            fntFetchInventarioById(frmIdProducto)   
            $('#setInventarioModal').modal('show')  
        }

        if (selected == 'restar') {
            frmInventario.reset()
            inventarioModalLabel.innerHTML = 'Egresar Producto'
            inventarioSumaResta.value = 'resta'
            idProducto.value = frmIdProducto
            fntFetchInventarioById(frmIdProducto)
            $('#setInventarioModal').modal('show')
        }

    } catch (error) {}
})

function fntFetchInventarioById(idProducto){
    fetch(base_url+`/inventario/getInventarioById/${idProducto}`)
    .then(res => res.json())
    .then(data => {
        data = data[0]
        nombreProductoLabel.innerHTML = data.nombreProducto;
        idProducto.value = idProducto
    }) 
}

frmInventario.addEventListener('submit', (e)=>{
    e.preventDefault()
    frmData = new FormData(frmInventario)
    fetch(base_url + '/inventario/setInventario',{
        method: "POST",
        body:frmData
    })
    .then((res)=>res.json())
    .then((data)=>{Swal.fire({
        title: data.status ? 'Correcto' : 'Error',
        text: data.msg,
        icon: data.status ? "success" : 'error'
        })
        if (data.status){
            frmInventario.reset()
            $('#setInventarioModal').modal('hide')
            tablaInventario.api().ajax.reload(function(){})
        }
    })
})