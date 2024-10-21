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
        let frm = new FormData(frmUsuarios);
        fetch(base_url + '/usuarios/setUsuario', {
            method: "POST",
            body: frm
        })
    })

})