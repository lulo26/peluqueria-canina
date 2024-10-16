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

  document.addEventListener('click', (e)=>{
    try {
        let selected = e.target.closest('button').getAttribute('data-action-type')
        let idMascota = e.target.closest('button').getAttribute('rel')
        //Eliminar mascota
        if (selected == 'delete') {
            Swal.fire({
                title:"Eliminar Mascota",
                text:"¿Está seguro de eliminar la mascota?",
                icon: "warning",
                showDenyButton: true,
                confirmButtonText: "Sí",
                denyButtonText: `Cancelar`
            }).then((result) => {
                if (result.isConfirmed) {
                    let formData = new FormData()
                    formData.append('idMascotas', idMascota)
                    fetch(base_url + '/mascotas/eliminarMascota',{
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
                        tablaMascotas.api().ajax.reload(function(){})
                    })
                }
              });

        }
        //Actualizar producto
        if (selected == 'update') {
            $('#insertarMascotasModal').modal('show')
            document.getElementById('insertarMascotasModal').innerHTML = "Actualizar Mascota"
            fetch(base_url + `/mascotas/getMascota/${idMascota}`,{
                method: "GET"
            })
            .then((res)=>res.json())
            .then((res)=>{
                arrData = res.data[0]
                console.log(arrData)
                document.querySelector('#nombreMascota').value = arrData.nombreMascota
                document.querySelector('#nombreUsuario').value = arrData.nombre
                document.querySelector('#razaMascota').value = arrData.razaMascota
                document.querySelector('#edadMascota').value = arrData.edadMascota
                document.querySelector('#comentarioMascota').value = arrData.comentarioMascota
            })
        }
    }catch{}
})

});
