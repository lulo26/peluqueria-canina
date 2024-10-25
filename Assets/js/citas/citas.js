
const formularioCitas = document.querySelector('#formularioCitas')
const insertarCitasModal = document.querySelector('#insertarCitas')
const btnCrearCita = document.querySelector('#btnCrearCita')
let tablaCitas;


let borrar_servicios = document.querySelector('#borrar_servicios')
//llevo la cuenta de cuantos divs con selects he creado(para el id)
var count_selects_created = 0
document.addEventListener('DOMContentLoaded',()=>{
    CargarServicios()
    CargarMascotas()
    CargarEmpleados()

    function CargarServicios() {
        fetch(base_url + `/citas/getServicios`)
        .then((res)=>res.json())
        .then((res)=>{
            res.forEach(element => {

                let opcion = document.createElement('option')
                opcion.value = element.id_servicio
                opcion.innerText = element.nombre_servicio
                
                document.querySelector('#servicio_select').appendChild(opcion)
            });
        })
    }

    function CargarMascotas() {
        fetch(base_url + `/citas/getMascotas`)
        .then((res)=>res.json())
        .then((res)=>{

            res.forEach(element => {
                let opcion = document.createElement('option')
                opcion.value = element.idMascotas
                opcion.innerText = element.nombreMascota

                document.querySelector('#mascota_select').appendChild(opcion)
            });
        })
    }

    function CargarEmpleados() {
        fetch(base_url + `/citas/getEmpleados`)
        .then((res)=>res.json())
        .then((res)=>{

            res.forEach(element => {
                let opcion = document.createElement('option')
                opcion.value = element.id_empleado
                opcion.innerText = element.nombre_empleado

                document.querySelector('#empleado_select').appendChild(opcion)
            });
        })
    }

    //evento que se dispara cuando en el primer select se selecciona un valor (se habilita el boton de agregar servicios)
    document.querySelector('#servicio_select').addEventListener('change',()=>{
        if (document.querySelector('#servicio_select').value>=1) {
            document.querySelector('#mas_servicios').disabled=false
        }else{
            document.querySelector('#mas_servicios').disabled=true
            let select = document.querySelectorAll('select[name="servicios[]"]')
                    if (select.length>1) {
                        let div_selects = document.querySelector('#select_servicios');
                        for (let index = 1; index < select.length; index++) {
                        div_selects.removeChild(div_selects.lastChild);    
                    }
            }
        }
    })

    //boton añadir mas servicios
    document.querySelector('#mas_servicios').addEventListener('click',(e)=>{
        
        e.preventDefault()
/*         borrar_servicios.disabled=false */
        //creamos un contenedor y un select
        let div  = document.createElement('div')
        div.setAttribute("class","input-group mb-3")
        div.setAttribute("id",count_selects_created+=1)
        let select = document.createElement('select')
        select.setAttribute('class','custom-select')
        select.setAttribute('name','servicios[]')
        select.innerHTML=`
        <option value="0" selected>Seleccione un servicio</option>
        `

        let div_label = document.createElement('div')
        div_label.setAttribute('class',"input-group-prepend")
        let label = document.createElement('label')
        label.setAttribute('class',"input-group-text btn-danger")
        label.setAttribute('id',"borrar_servicios")
        label.innerText="Borrar"

        div_label.appendChild(label)
        div.appendChild(select)
        div.appendChild(div_label)
        document.querySelector('#select_servicios').appendChild(div)

        fetch(base_url + "/citas/getServicios")
        .then((res)=>res.json())
        .then((res)=>{
            res.forEach(element => {
                //al select le creamos las opciones con los servicios disponibles
                let opcion = document.createElement('option')
                    opcion.value = element.id_servicio
                    opcion.innerText = element.nombre_servicio
                    select.appendChild(opcion)
            });
            
        })  

    })

    /* borrar_servicios.addEventListener('click',(e)=>{
        e.preventDefault()
        let div_selects = document.querySelector('#select_servicios');
        div_selects.removeChild(div_selects.lastChild);
    }) */
    
    tablaCitas = $('#tablaCitas').dataTable({
        "language": {
            "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
        },
        "ajax":{
            "url": " "+base_url+"/citas/getCitas",
            "dataSrc":""
        },
        "columns":[
            {"data":"fecha_inicio"},
            {"data":"fecha_final"},
            {"data":"lugar_cita"},
            {"data":"nombre_mascota"},
            {"data":"nombre_empleado"},
            {"data":"options"}
        ],
        "responsive": "true",
        "order":[[0, "asc"]]
    })

    formularioCitas.addEventListener('submit',(e)=>{
        e.preventDefault()
        let select = document.querySelectorAll('select[name="servicios[]"]')
        for (let index = 0; index < select.length; index++) {
            if (select[index].value==0) {
                select[index].removeAttribute("name")
            }
        }

        frmCitas = new FormData(formularioCitas)
        fetch(base_url + '/citas/setCitas',{
            method:"POST",
            body:frmCitas
        })

        .then((res)=>res.json())
        .then((dataInsert)=>{
            Swal.fire({
                title: dataInsert.status ? 'Correcto' : 'Error',
                text: dataInsert.msg,
                icon: dataInsert.status ? "success" : 'error'
            })

            if (dataInsert.status) {
                formularioCitas.reset()
                $('#insertarCitas').modal('hide')
                tablaCitas.api().ajax.reload(function(){})
                //borramos los select creados anteriormente y dejamos solo el primero
                document.querySelector('#select_servicios').innerHTML=""
                document.querySelector('#select_servicios').innerHTML=`
                            <span>Servicios</span>

                            <div class="servicios">
                                <select class="custom-select" name="servicios[]" id="servicio_select">
                                        <option value="0" selected>Seleccione un servicio</option>
                                </select>
                            </div>
                `
                CargarServicios()
            }
        })
    })

    btnCrearCita.addEventListener('click',()=>{
        document.querySelector('#id_cita').value = 0
        formularioCitas.reset()
        $('#insertarCitas').modal('show')
        document.querySelector('#titulo').innerHTML='Agendar cita'
        
    })
    
    document.addEventListener('click', (e)=>{
        try {
            let selected = e.target.closest('button').getAttribute('data-action-type')
            let id_cita = e.target.closest('button').getAttribute('rel')

            //accion borrar clientes
            if (selected == 'delete') {
                Swal.fire({
                    title:"Eliminar Cita",
                    text:"¿Está seguro de eliminar esta cita?",
                    icon: "warning",
                    showDenyButton: true,
                    confirmButtonText: "Sí",
                    denyButtonText: `Cancelar`
                }).then((result) => {
                    if (result.isConfirmed) {
                        let formData = new FormData()
                        formData.append('id_cita', id_cita)
                        fetch(base_url + '/citas/deleteCitas',{
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
                            tablaCitas.api().ajax.reload(function(){})
                        })
                    }
                  });

            }
            //actualización clientes
            if (selected == 'update') {

                $('#insertarCitas').modal('show')
                document.querySelector('#titulo').innerHTML = "Actualizar cita"
                fetch(base_url + `/citas/getCitasByID/${id_cita}`,{
                    method: "GET"
                })
                .then((res)=>res.json())
                .then((res)=>{
                    const inputs = ['#fecha_inicio','#fecha_final','#lugar_cita','#mascota_select','#empleado_select',"#id_cita"]

                    arrData = res.data[0]

                    const values = [arrData.fecha_inicio,arrData.fecha_final,arrData.lugar_cita,arrData.mascotas_idMascotas,arrData.empleados_idEmpleados,arrData.id_cita]
                    
                    
                    for (let index = 0; index < inputs.length; index++) {
                        document.querySelector(inputs[index]).value=values[index]
                    }
                })



            }

        }catch{}
    })

})

