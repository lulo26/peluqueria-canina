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
            {"data":"precio"},
            {"data":"codigoSKU"},
            {"data":"options"}
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
            if (data.status){
                frmProductos.reset()
                $('#crearProductoModal').modal('hide')
                tablaProductos.api().ajax.reload(function(){})
            }
        })
    })

    //delProducto
    //extraer el atributo
    document.addEventListener('click', (e)=>{
        try {
            let selected = e.target.closest('button').getAttribute('data-action-type')
            let idProducto = e.target.closest('button').getAttribute('rel')
            if (selected == 'delete') {
                Swal.fire({
                    title:"Eliminar Producto",
                    text:"¿Está seguro de eliminar el producto?",
                    icon: "warning",
                    showDenyButton: true,
                    confirmButtonText: "Sí",
                    denyButtonText: `Cancelar`
                }).then((result) => {
                    if (result.isConfirmed) {
                        let formData = new FormData()
                        formData.append('idProducto', idProducto)
                        fetch(base_url + '/inventario/eliminarProducto',{
                            method: "POST",
                            body: formData,
                        })
                        .then((res)=>res.json())
                        .then((data)=>{
                            Swal.fire({
                                title: data.status ? 'Correcto' : 'Error',
                                text: data.msg,
                                icon: data.status ? "success" : 'error'
                            })
                            tablaProductos.api().ajax.reload(function(){})
                        })
                    }
                  });

            }

            if (selected == 'update') {
                $('#crearProductoModal').modal('show')
            }
        }catch{}
    })
})

