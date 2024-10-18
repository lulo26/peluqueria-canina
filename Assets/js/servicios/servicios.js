const formularioServicios = document.querySelector('#formularioServicios')
//modal
const insertarServicios = document.querySelector('#insertarServicios')
const btnCrearServicio = document.querySelector('#btnCrearServicio')
let tablaServicios;

document.addEventListener("DOMContentLoaded",()=>{

    tablaServicios = $('#tablaServicios').dataTable({
        "language": {
            "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
        },
        "ajax":{
            "url": " "+base_url+"/servicios/getServicios",
            "dataSrc":""
        },
        "columns":[
            {"data":"nombre_servicio"},
            {"data":"precio_servicio"},
            {"data":"descripcion_servicio"},
            {"data":"options"}
        ],
        "responsive": "true",
        "order":[[0, "asc"]]
    })

    btnCrearServicio.addEventListener('click', ()=>{
        document.querySelector('#id_servicio').value = 0
        formularioServicios.reset()
        $('#insertarServicios').modal('show')
        document.getElementById('titulo_modal_servicios').innerHTML = "Registro de servicios"
    })

    formularioServicios.addEventListener('submit', (e)=>{
        e.preventDefault()
        frmData = new FormData(formularioServicios)
        fetch(base_url + '/servicios/setServicios',{
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
                formularioServicios.reset()
                $('#insertarServicios').modal('hide')
                tablaServicios.api().ajax.reload(function(){})
            }
        })
    })

    document.addEventListener('click', (e)=>{
        try {
            let selected = e.target.closest('button').getAttribute('data-action-type')
            let id_servicio = e.target.closest('button').getAttribute('rel')
            //Eliminar producto
            if (selected == 'delete') {
                Swal.fire({
                    title:"Eliminar servicio",
                    text:"¿Está seguro de eliminar el servicio?",
                    icon: "warning",
                    showDenyButton: true,
                    confirmButtonText: "Sí",
                    denyButtonText: `Cancelar`
                }).then((result) => {
                    if (result.isConfirmed) {
                        let formData = new FormData()
                        formData.append('id_servicio', id_servicio)
                        fetch(base_url + '/servicios/deleteServicios',{
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
                            tablaServicios.api().ajax.reload(function(){})
                        })
                    }
                  });

            }
            //Actualizar producto
            if (selected == 'update') {
                $('#insertarServicios').modal('show')
                document.getElementById('titulo_modal_servicios').innerHTML = "Actualizar Servicio"
                fetch(base_url + `/servicios/selectServicioById/${id_servicio}`,{
                    method: "GET"
                })
                .then((res)=>res.json())
                .then((res)=>{
                    const inputs = ['#nombre','#precio','#descripcion','#id_servicio']
                   
                    arrData = res.data[0]

                    const values = [arrData.nombre_servicio,arrData.precio_servicio,arrData.descripcion_servicio,arrData.id_servicio]
                    
                    for (let index = 0; index < inputs.length; index++) {
                        document.querySelector(inputs[index]).value=values[index]
                    }
                    
                })
            }
        }catch (error){
            console.log(error)
        }
    })



})
