const formularioClientes = document.querySelector('#formularioClientes')
const insertarClientesModal = document.querySelector('#insertarClientesModal')

document.addEventListener('DOMContentLoaded',()=>{

    formularioClientes.addEventListener('submit',(e)=>{
        e.preventDefault()

        formularioClientes = new FormData(formularioClientes)
        fetch(base_url + '/clientes/setClientes',{
            method:"POST",
            body:formularioClientes
        })

        .then((res)=>res.json())
        .then((dataInsert)=>{
            Swal.fire({
                title: dataInsert.status ? 'Correcto' : 'Error',
                text: dataInsert.msg,
                icon: dataInsert.status ? "success" : 'error'
            })

            if (dataInsert.status) {
                formularioClientes.reset()
                $('#formularioClientes').modal('hide')
            }
        })
    })
})
