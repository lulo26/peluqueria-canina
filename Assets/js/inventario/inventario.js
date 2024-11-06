//const setInventarioModal = document.querySelector('#setInventarioModal')
const btnIngresarProducto = document.querySelector('#btnIngresarProducto')
const btnEgresarProducto = document.querySelector('#btnEgresarProducto')
const inventarioModalLabel = document.querySelector('#inventarioModalLabel')
const frmInventario = document.querySelector('#frmInventario')
const nombreProductoLabel = document.querySelector('#nombreProductoLabel')
const cantidadProducto = document.querySelector('#cantidadProducto')

btnIngresarProducto.addEventListener('click', ()=>{
    $('#setInventarioModal').modal('show')
})

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
        let selected = e.target.closest('button').getAttribute('data-action-type')
        let idProducto = e.target.closest('button').getAttribute('rel')
        frmInventario.reset()

        fetch(base_url+`/inventario/getInventarioById/${idProducto}`)
        .then(res => res.json())
        .then(data => {
            data = data[0]
            nombreProductoLabel.innerHTML = data.nombreProducto;
            
            if (selected == 'sumar') {
                inventarioModalLabel.innerHTML = 'Ingresar Producto';
            }
    
            if (selected == 'restar') {
                inventarioModalLabel.innerHTML = 'Egresar Producto';
            }
            $('#setInventarioModal').modal('show')
        })

    } catch (error) {}
})

document.addEventListener('submit', (e)=>{
    e.preventDefault()
    console.log('se ha hecho submit')
})