const frmMascotas = document.querySelector("#frmMascotas");
const crearProductoModal = document.querySelector("#insertarMascotasModal");
let nombreUsuario = document.querySelector("#nombreUsuario");
const btnInsertarMascota = document.querySelector('#btnInsertarMascota');
let selectMascotas;
let tablaMascotas;

console.log("hello world");


document.addEventListener("DOMContentLoaded", () => {

  btnInsertarMascota.addEventListener('click', (e) =>{
    //traigame los datos del select
    fetch(base_url + "/clientes/getClientes")
      .then((res)=>res.json())
      .then((data) => {
        data.forEach(el => {
          nombreUsuario.innerHTML += `<option value="${el.idClientes}">${el.nombre}</option>`

        });
      })
    $('#insertarMascotasModal').modal('show')
  })

  tablaMascotas = $("#tablaMascotas").dataTable({
    language: {
      url: `${base_url}/Assets/vendor/datatables/dataTables_es.json`,
    },
    ajax: {
      url: " " + base_url + "/mascotas/getMascotas",
      dataSrc: "",
    },
    columns: [
      {"data":"nombreMascota" },
      {"data":"razaMascota" },
      {"data":"edadMascota" },
      {"data":"comentarioMascota" },
      {"data":"nombre" },
      {"data":"options"}
    ],
    responsive: "true",
    order: [[0, "asc"]],
  });

  frmMascotas.addEventListener("submit", (e) => {
    e.preventDefault();
    frmData = new FormData(frmMascotas);
    
    fetch(base_url + "/mascotas/setMascotas", {
      method: "POST",
      body: frmData,
    })
      .then((res) => res.json())
      .then((data) => {Swal.fire({
          title: data.status ? "Correcto" : "Error",
          text: data.msg,
          icon: data.status ? "success" : "error",
        });
        if (data.status) {
          frmMascotas.reset();
          $("#insertarMascotasModal").modal("hide");
          tablaMascotas.api().ajax.reload(function () {});
        }
      });
  });
});
