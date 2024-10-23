const btnCrearUsuario = document.querySelector('#btnCrearUsuario')
const frmUsuarios = document.querySelector('#frmUsuarios')

document.addEventListener('DOMContentLoaded', ()=>{

    tablaUsuarios = $('#tablaUsuarios').dataTable({
        "language": {
            "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
        },
        "ajax":{
            "url": " "+base_url+"/usuarios/getUsuarios",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_persona"},
            {"data":"nombres"},
            {"data":"apellidos"},
            {"data":"email_user"},
            {"data":"telefono"},
            {"data":"nombre_rol"},
            {"data":"status"},
            {"data":"options"}
        ],
        "responsive": "true",
        "iDisplayLength": 10,
        "order":[[0, "asc"]]
    }) 
    
    btnCrearUsuario.addEventListener('click', ()=>{
        document.getElementById('crearUsuarioModalLabel').innerHTML = "Crear Usuario"
        frmUsuarios.reset()
        $('#crearUsuarioModal').modal('show')
        getRolesOptions()
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
                tablaUsuarios.api().ajax.reload(function(){})
            }
        })
    })

    document.addEventListener('click', (e) =>{
        try {
            let selected = e.target.closest('button').getAttribute('data-action-type')
            let idUsuario = e.target.closest('button').getAttribute('data-id')

            if (selected == 'viewUsuario') {
                fetch(base_url + '/usuarios/getUsuario/' + idUsuario)
                .then((res)=>res.json())
                .then((dataOrigin)=>{
                    if(dataOrigin.status){
                        data = dataOrigin.data[0]
                        document.querySelector('#celIdentificacion').innerHTML = data.identificacion
                        document.querySelector('#celNombre').innerHTML = data.nombres
                        document.querySelector('#celApellido').innerHTML = data.apellidos
                        document.querySelector('#celTelefono').innerHTML = data.telefono
                        document.querySelector('#celEmail').innerHTML = data.email_user
                        document.querySelector('#celTipoUsuario').innerHTML = data.nombre_rol
                        let userStatus = data.status == 1 ? `<span class="badge badge-success">Activo</span>` : `<span class="badge badge-danger">Inactivo</span>`
                        document.querySelector('#celEstado').innerHTML = userStatus
                        document.querySelector('#celFechaRegistro').innerHTML = data.fechaRegistro
                        $('#verUsuarioModal').modal('show')
                    }else{
                        Swal.fire({
                            title: 'Error',
                            text: dataOrigin.msg,
                            icon: 'error'
                        })
                    }

                })
            }

            if (selected == 'delete') {
                Swal.fire({
                    title:"Eliminar usuario",
                    text:"¿Está seguro de eliminar el usuario?",
                    icon: "warning",
                    showDenyButton: true,
                    confirmButtonText: "Sí",
                    denyButtonText: `Cancelar`
                }).then((result)=>{
                     if (result.isConfirmed) {
                        let frmData = new FormData()
                        frmData.append('idUsuario', idUsuario)
                        fetch(base_url + '/usuarios/deleteUsuario',{
                            method: "POST",
                            body: frmData,
                        })
                        .then((res)=>res.json())
                        .then((data)=>{
                            Swal.fire({
                                title: data.status ? 'Correcto' : 'Error',
                                text: data.msg,
                                icon: data.status ? "success" : 'error'
                            })
                            tablaUsuarios.api().ajax.reload(function(){})
                        })
                    } 
                })
            }

            if (selected == 'update') {
                frmUsuarios.reset()
                getRolesOptions()
                document.getElementById('crearUsuarioModalLabel').innerHTML = "Modificar Usuario"
                 fetch(base_url + `/usuarios/getUsuario/${idUsuario}`,{
                    method: "GET"
                })
                .then((res)=>res.json())
                .then((res)=>{
                    arrData = res.data[0]
                    document.querySelector('#idUsuario').value = arrData.id_persona
                    document.querySelector('#txtIdentificacion').value = arrData.identificacion
                    document.querySelector('#txtNombres').value = arrData.nombres
                    document.querySelector('#txtApellidos').value = arrData.apellidos
                    document.querySelector('#txtTelefono').value = arrData.telefono
                    document.querySelector('#txtEmail').value = arrData.email_user
                    document.querySelector('#listRolId').value = arrData.rol_id
                    document.querySelector('#listStatus').value = arrData.status
                }) 

                $('#crearUsuarioModal').modal('show')
            }

        } catch (error) {}
    })

    function getRolesOptions(){
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
    }

})