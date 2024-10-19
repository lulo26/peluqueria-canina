
const formularioCitas = document.querySelector('#formularioCitas')
const insertarCitasModal = document.querySelector('#insertarCitas')
const btnCrearCita = document.querySelector('#btnCrearCita')

let checkbox_servicios = document.querySelector('#checkbox-servicios')
let tablaCitas;

document.addEventListener('DOMContentLoaded',()=>{


    function CargarServicios() {
        fetch(base_url + `/citas/getServicios`)
        .then((res)=>res.json())
        .then((res)=>{

            res.forEach(element => {
                checkbox_servicios.innerHTML+=`
                <input class="form-check-input" type="checkbox" value="${element.id_servicio}" name="${element.nombre_servicio}">
                 <label for="${element.nombre_servicio}">${element.nombre_servicio}</label>
                `
            });
        })
    }

    CargarServicios()
    

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
            {"data":"nombre_servicio"},
            {"data":"clientes_idClientes"},
            {"data":"empleados_idEmpleados"},
            {"data":"options"}
        ],
        "responsive": "true",
        "order":[[0, "asc"]]
    })

    btnCrearCita.addEventListener('click',()=>{
        document.querySelector('#id_cita').value = 0
        formularioCitas.reset()
        $('#insertarCitas').modal('show')
        document.querySelector('#titulo').innerHTML='Agendar cita'
        
    })
})

