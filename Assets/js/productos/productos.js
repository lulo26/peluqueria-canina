const frmProductos = document.querySelector("#frmProductos");
const crearProductoModal = document.querySelector("#crearProductoModal");
const btnCrearProducto = document.querySelector('#btnCrearProducto')
let tablaProductos;

document.addEventListener('DOMContentLoaded', ()=>{

    tablaProductos = $('#tablaProductos').dataTable({
        "language": {
            "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
        },
        "ajax":{
            "url": " "+base_url+"/productos/getProductos",
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

    btnCrearProducto.addEventListener('click', ()=>{
        document.querySelector('#idProducto').value = 0
        frmProductos.reset()
        $('#crearProductoModal').modal('show')
        document.getElementById('crearProductoModalLabel').innerHTML = "Crear Producto"
    })

    frmProductos.addEventListener('submit', (e)=>{
        e.preventDefault()
        frmData = new FormData(frmProductos)
        fetch(base_url + '/productos/setProducto',{
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

    document.addEventListener('click', (e)=>{
        try {
            let selected = e.target.closest('button').getAttribute('data-action-type')
            let idProducto = e.target.closest('button').getAttribute('rel')
            //Eliminar producto
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
                        fetch(base_url + '/productos/eliminarProducto',{
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
            //Actualizar producto
            if (selected == 'update') {
                $('#crearProductoModal').modal('show')
                document.getElementById('crearProductoModalLabel').innerHTML = "Actualizar Producto"
                fetch(base_url + `/productos/getProducto/${idProducto}`,{
                    method: "GET"
                })
                .then((res)=>res.json())
                .then((res)=>{
                    arrData = res.data[0]
                    console.log(arrData)
                    document.querySelector('#nombreProducto').value = arrData.nombreProducto
                    document.querySelector('#precioProducto').value = arrData.precio
                    document.querySelector('#codigoProducto').value = arrData.codigoSKU
                    document.querySelector('#idProducto').value = arrData.idInventario
                })
            }
        }catch{}
    })
})

