
const formularioCitas = document.querySelector('#formularioCitas')
const insertarCitasModal = document.querySelector('#insertarCitas')
const btnCrearCita = document.querySelector('#btnCrearCita')
let checkbox_servicios = document.querySelector('#checkbox-servicios')
let tablaCitas;

document.addEventListener('DOMContentLoaded',()=>{

    CargarServicios()
    CargarClientes()
    CargarEmpleados()

    function CargarServicios() {
        fetch(base_url + `/citas/getServicios`)
        .then((res)=>res.json())
        .then((res)=>{

            res.forEach(element => {
                checkbox_servicios.innerHTML+=`
                <div class="col"> 
                    <input class="form-check-input" type="checkbox" value="${element.id_servicio}" name="servicios[]">
                    <label for="${element.nombre_servicio}">${element.nombre_servicio}</label>   
                </div>
                
                `
            });
        })
    }

    function CargarClientes() {
        fetch(base_url + `/citas/getClientes`)
        .then((res)=>res.json())
        .then((res)=>{

            res.forEach(element => {
                let opcion = document.createElement('option')
                opcion.value = element.idClientes
                opcion.innerText = element.nombre

                document.querySelector('#cliente_select').appendChild(opcion)
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
    

    tablaCitas = $('#tablaCitas').dataTable({
        "language": {
            "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
        },
        "ajax":{
            "url": " "+base_url+"/citas/getCitas",
            "dataSrc":function (json) {
                json.forEach(cita => {
                    cita.nombre_cliente = `${cita.nombre_cliente} ${cita.apellido_cliente}`;
                    cita.nombre_empleado = `${cita.nombre_empleado} ${cita.apellido_empleado}`;
            })
                return json;
            }
        },
        "columns":[
            {"data":"fecha_inicio"},
            {"data":"fecha_final"},
            {"data":"lugar_cita"},
            {"data":"nombre_cliente"},
            {"data":"nombre_empleado"},
            {"data":"options"}
        ],
        "responsive": "true",
        "order":[[0, "asc"]]
    })

    formularioCitas.addEventListener('submit',(e)=>{
        e.preventDefault()

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
                $('#insertarCitasModal').modal('hide')
                tablaCitas.api().ajax.reload(function(){})
            }
        })
    })

    btnCrearCita.addEventListener('click',()=>{
        document.querySelector('#id_cita').value = 0
        formularioCitas.reset()
        $('#insertarCitas').modal('show')
        document.querySelector('#titulo').innerHTML='Agendar cita'
        
    })
})

