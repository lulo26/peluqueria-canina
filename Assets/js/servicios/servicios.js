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




})
