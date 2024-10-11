const formularioClientes = document.querySelector('#formularioClientes')
const insertarClientesModal = document.querySelector('#insertarClientesModal')

document.addEventListener('DOMContentLoaded',()=>{
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
            }
        })
    })
})
