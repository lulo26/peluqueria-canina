const frmProductos = document.querySelector('#frmProductos')
const crearProductoModal = document.querySelector('#crearProductoModal')
let tablaProductos

document.addEventListener('DOMContentLoaded', ()=>{

    tablaProductos = $('#tablaProductos').dataTable({
        "language": {
            "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
        },
        "ajax":{
            "url": " "+base_url+"/inventario/getProductos",
            "dataSrc":""
        },
        "columns":[
            {"data":"nombreProducto"},
            {"data":"cantidadProducto"},
            {"data":"estado"},
            {"data":"precio"},
            {"data":"codigoSKU"},
        ],
        "responsive": "true",
        "order":[[0, "asc"]]
    }) 

    frmProductos.addEventListener('submit', (e)=>{
        e.preventDefault()
        frmData = new FormData(frmProductos)
        fetch(base_url + '/inventario/setProducto',{
            method: "POST",
            body: frmData
        })
        .then((res)=>res.json())
        .then((data)=>{Swal.fire({
            title: data.status ? 'Correcto' : 'Error',
            text: data.msg,
            icon: data.status ? "success" : 'error'
            })
            console.log(data.status)
            if (data.status){
                console.log('propiedad disparada')
                frmProductos.reset()
                $('#crearProductoModal').modal('hide')
            }
        })
    })
})

