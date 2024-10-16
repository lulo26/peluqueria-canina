const btnCrearRol = document.querySelector('#btnCrearRol')
const frmRol = document.querySelector("#frmRoles")
const crearRolModal = document.querySelector("#crearRolModal")
const permisosRolModal = document.querySelector('#permisosRolModal')
let tablaRoles

document.addEventListener('DOMContentLoaded', ()=>{

    tablaRoles = $('#tablaRoles').dataTable({
        "language": {
            "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
        },
        "ajax":{
            "url": " "+base_url+"/roles/getRoles",
            "dataSrc":""
        },
        "columns":[
            {"data":"nombre_rol"},
            {"data":"descripcion_rol"},
            {"data":"status_rol"},
            {"data":"options"}
        ],
        "responsive": "true",
        "order":[[0, "asc"]]
    }) 

    btnCrearRol.addEventListener('click', ()=>{
        document.querySelector('#idRol').value = 0
        frmRol.reset()
        $('#crearRolModal').modal('show')
        document.getElementById('crearRolModalLabel').innerHTML = "Crear Rol"
    })

    document.addEventListener('submit', (e)=>{
        e.preventDefault()
        frmData = new FormData(frmRol)
        fetch(base_url + '/roles/setRol',{
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
                frmRol.reset()
                $('#crearRolModal').modal('hide')
                tablaRoles.api().ajax.reload(function(){})
            }
        })
    })

    document.addEventListener('click', (e)=>{
        try {
            let selected = e.target.closest('button').getAttribute('data-action-type')
            let idRol = e.target.closest('button').getAttribute('rel')
            //Eliminar
            if (selected == 'delete') {
                Swal.fire({
                    title:"Eliminar Rol",
                    text:"¿Está seguro de eliminar el Rol?",
                    icon: "warning",
                    showDenyButton: true,
                    confirmButtonText: "Sí",
                    denyButtonText: `Cancelar`
                }).then((result)=>{
                    if (result.isConfirmed) {
                        let frmData = new FormData()
                        frmData.append('idRol', idRol)
                        fetch(base_url + '/roles/eliminarRol',{
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
                            tablaRoles.api().ajax.reload(function(){})
                        })
                    }
                })
            }
            //Update
            if (selected == 'update') {
                frmRol.reset()
                $('#crearRolModal').modal('show')
                document.getElementById('crearRolModalLabel').innerHTML = "Actualizar Rol"
                fetch(base_url + `/roles/getRol/${idRol}`,{
                    method: "GET"
                })
                .then((res)=>res.json())
                .then((res)=>{
                    arrData = res.data
                    console.log(arrData)
                    document.querySelector('#nombreRol').value = arrData.nombre_rol
                    document.querySelector('#descripcionRol').value = arrData.descripcion_rol
                    document.querySelector('#estadoRol').value = arrData.status_rol
                    document.querySelector('#idRol').value = arrData.id_rol
                })
            }
            //Permisos
            if (selected == 'permisos') {
                $('#permisosRolModal').modal('show')
            }
        } catch (error) {}
    })
})