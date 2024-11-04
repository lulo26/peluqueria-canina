
const formularioCitas = document.querySelector('#formularioCitas')
const insertarCitasModal = document.querySelector('#insertarCitas')
const btnCrearCita = document.querySelector('#btnCrearCita')
let tablaCitas;

let borrar_servicios = document.querySelector('#borrar_servicios')

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

    function LoadServices(id_select,valor_select) {
        fetch(base_url + `/citas/getServicios`)
        .then((res)=>res.json())
        .then((res)=>{

            for (let index = 0; index < res.length; index++) {
                let opcion = document.createElement('option')
                opcion.value = res[index].id_servicio
                opcion.innerText = res[index].nombre_servicio
                document.getElementById(id_select).appendChild(opcion)
            }

            if (valor_select) {
                document.getElementById(id_select).value=valor_select
            }

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
                opcion.value = element.id_persona
                opcion.innerText = element.nombres

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
        //creamos un contenedor y un select
        let div  = document.createElement('div')
        div.setAttribute("class","input-group mb-3")
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

    const on = (element, event, selector, handler) => {
        element.addEventListener(event, (e) => {
          if (e.target.closest(selector)) {
            handler(e);
          }
        });
      };

      on(document,"click","#borrar_servicios",(e)=>{
        e.target.parentNode.parentNode.remove()
      })

    
    tablaCitas = $('#tablaCitas').dataTable({
        "language": {
            "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
        },
        "ajax":{
            "url": " "+base_url+"/citas/getCitas",
            "dataSrc":""
        },
        "columns":[
            {"data":"dia_cita"},
            {"data":"hora_inicio"},
            {"data":"hora_final"},
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
    
    let id_select = 1
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
                    const inputs = ['#dia_cita','#hora_inicio','#hora_final','#lugar_cita','#mascota_select','#empleado_select',"#id_cita"]

                    arrData = res.data[0]

                    const values = [arrData.dia_cita,arrData.hora_inicio,arrData.hora_final,arrData.lugar_cita,arrData.mascotas_idMascotas,arrData.personas_id_persona,arrData.id_cita]
                    
                    for (let index = 0; index < inputs.length; index++) {
                        document.querySelector(inputs[index]).value=values[index]
                    }
                })

                fetch(base_url + `/citas/getServiciosByID/${id_cita}`)
                    .then((res)=>res.json())
                    .then((res)=>{
                        document.querySelector("#servicio_select").value=res.data[0].servicios_id_servicio
                        document.querySelector('#mas_servicios').disabled=false

                        if (res.data.length>1) {

                            for (let index = 1; index < res.data.length; index++){

                                //creamos un contenedor que tendra un select por cada servicio que el cliente haya registrado en la cita
                                let div  = document.createElement('div')
                                div.setAttribute("class","input-group mb-3")
                                //creamos el select para el contenedor
                                let select = document.createElement('select')
                                select.setAttribute('class','custom-select')
                                select.setAttribute('name','servicios[]')
                                select.setAttribute('id',id_select)
                                select.innerHTML=`
                                <option value="0" selected>Seleccione un servicio</option>
                                `
    
                                //creamos un div que contiene el boton borrar de cada nuevo select
                                let div_label = document.createElement('div')
                                div_label.setAttribute('class',"input-group-prepend")
                                //lavel para el anterior div
                                let label = document.createElement('label')
                                label.setAttribute('class',"input-group-text btn-danger")
                                label.setAttribute('id',"borrar_servicios")
                                label.innerText="Borrar"

                                 //juntamos el div que contiene el btn borrar con el div que contiene el select
                                 div_label.appendChild(label)
                                 div.appendChild(select)
                                 div.appendChild(div_label)
                                 document.querySelector('#select_servicios').appendChild(div)

                                 //cargamos funcion que crea las opciones que tiene el nuevo select y le asigna el valor que corresponde al que se guardo en el registro de la cita
                                LoadServices(id_select,res.data[index].servicios_id_servicio )
                                id_select+=1;  
                                }
                        }
                        
                    })
            }

        }catch{

        }
    })

    $('#insertarCitas').on('hidden.bs.modal',function (){
        id_select=1

        document.querySelector('#select_servicios').innerHTML=""
                document.querySelector('#select_servicios').innerHTML=`
                            <span>Servicios</span>

                            <div class="input-group mb-3">
                                    <select class="custom-select" name="servicios[]" id="servicio_select">
                                                    <option value="0" selected>Seleccione un servicio</option>
                                    </select>
                            </div>
                `
                CargarServicios()
    })

})

