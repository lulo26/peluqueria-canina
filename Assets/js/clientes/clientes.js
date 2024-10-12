const formularioClientes = document.querySelector('#formularioClientes')
const insertarClientesModal = document.querySelector('#insertarClientesModal')
let tablaClientes;

document.addEventListener('DOMContentLoaded',()=>{

    tablaClientes = $('#tablaClientes').dataTable({
        "language": {
            "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
        },
        "ajax":{
            "url": " "+base_url+"/clientes/getClientes",
            "dataSrc":""
        },
        "columns":[
            {"data":"nombre"},
            {"data":"apellido"},
            {"data":"correo"},
            {"data":"telefono"},
            {"data":"usuario"},
            {"data":"options"}
        ],
        "responsive": "true",
        "order":[[0, "asc"]]
    })

    formularioClientes.addEventListener('submit',(e)=>{
        console.log('elpepe')
        e.preventDefault()

        frmClientes = new FormData(formularioClientes)
        fetch(base_url + '/clientes/setClientes',{
            method:"POST",
            body:frmClientes
        })

        .then((res)=>res.json())
        .then((dataInsert)=>{
            console.log(dataInsert)
            Swal.fire({
                title: dataInsert.status ? 'Correcto' : 'Error',
                text: dataInsert.msg,
                icon: dataInsert.status ? "success" : 'error'
            })

            if (dataInsert.status) {
                formularioClientes.reset()
                $('#formularioClientes').modal('hide')
                tablaClientes.api().ajax.reload(function(){})
            }
        })
    })

    document.addEventListener('click', (e)=>{
        try {
            let selected = e.target.closest('button').getAttribute('data-action-type')
            let idCliente = e.target.closest('button').getAttribute('rel')
            if (selected == 'delete') {
                Swal.fire({
                    title:"Eliminar Cliente",
                    text:"¿Está seguro de eliminar el cliente?",
                    icon: "warning",
                    showDenyButton: true,
                    confirmButtonText: "Sí",
                    denyButtonText: `Cancelar`
                }).then((result) => {
                    if (result.isConfirmed) {
                        let formData = new FormData()
                        formData.append('idClientes', idCliente)
                        fetch(base_url + '/clientes/deleteClientes',{
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
                            tablaClientes.api().ajax.reload(function(){})
                        })
                    }
                  });

            }

            console.log(selected)
            if (selected == 'update') {
                $('#insertarClientesModal').modal('show')
            }

        }catch{}
    })

})
