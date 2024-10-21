const btnCrearUsuario = document.querySelector('#btnCrearUsuario')
const frmUsuarios = document.querySelector('#frmUsuarios')

document.addEventListener('DOMContentLoaded', ()=>{
    
    btnCrearUsuario.addEventListener('click', ()=>{
        $('#crearUsuarioModal').modal('show')

        fetch(base_url + '/roles/getSelectRoles',{
            method: "GET"
        })
        .then((res)=>{
            return res.text()
        })
        .then((html)=>{
            document.getElementById('listRolId').innerHTML = '<option value="0">Seleccione el tipo de usuario</option>'
            document.getElementById('listRolId').innerHTML += html
        })
    })

    frmUsuarios.addEventListener('submit', (e)=>{
        e.preventDefault()

        let strIdentificacion = document.querySelector('#txtIdentificacion').value
        let strNombre = document.querySelector('#txtNombres').value
        let strApellido = document.querySelector('#txtApellidos').value
        let strEmail = document.querySelector('#txtEmail').value
        let intTelefono = document.querySelector('#txtTelefono').value
        let intTipoUsuario = document.querySelector('#listRolId').value
        //let strPassword = document.querySelector('#txtPassword').value

        if (strIdentificacion == '' || strNombre == '' || strApellido == '' || strEmail == '' || intTelefono == '' || intTipoUsuario == '') {
            Swal.fire({
                title: 'Atencion',
                text: 'Todos los campos son obligatorios',
                icon: 'Error'
            })

            return false
        }

        let formUsuarios = new FormData(frmUsuarios);

        fetch(base_url + '/usuarios/setUsuario', {
            method: "POST",
            body: formUsuarios
        })
        .then((res)=>res.json())
        .then((data)=>{Swal.fire({
            title: data.status ? 'Correcto' : 'Error',
            text: data.msg,
            icon: data.status ? "success" : 'error'
            })
            if (data.status){
                frmUsuarios.reset()
                $('#crearUsuarioModal').modal('hide')
                tablaRoles.api().ajax.reload(function(){})
            }
        })
    })

})