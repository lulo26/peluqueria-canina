const frmMascotas = document.querySelector("#frmMascotas");
const frmRazasMascotas = document.querySelector("#frmRazas");
const crearProductoModal = document.querySelector("#insertarMascotasModal");
let nombreUsuario = document.querySelector("#nombreUsuario");
let razaMascota = document.querySelector("#razaMascota");
const btnInsertarMascota = document.querySelector("#btnInsertarMascota");
let nuevaRazaMascota = document.querySelector("#agregarNuevo");
let insertarRazaModal = document.querySelector("#insertarRazaModal");
let selectMascotas;
let tablaMascotas;

console.log("hello world");
/* 
razaMascota.addEventListener("click", (e)=>{
  razaMascota.innerHTML = `<option value="0" selected hidden">Seleccione la raza</option>`;
  fetch(base_url + "/razas/getRazas")
    .then((res) => res.json())
    .then((data) => {
      data.forEach((raza) => {
        razaMascota.innerHTML += `<option value="${raza.idRaza}">${raza.nombreRaza}</option>`;
      });
    });
}) */

//insertar mascota
btnInsertarMascota.addEventListener("click", (e) => {
  //traigame los datos del select
  nombreUsuario.innerHTML = `<option value="0" selected hidden>seleccione el dueño</option>`;
  fetch(base_url + "/clientes/getClientes")
    .then((res) => res.json())
    .then((data) => {
      data.forEach((el) => {
        nombreUsuario.innerHTML += `<option value="${el.idClientes}">${el.nombre}</option>`;
      });
    });

  razaMascota.innerHTML = `<option value="0" selected hidden">Seleccione la raza</option>`;
  fetch(base_url + "/razas/getRazas")
    .then((res) => res.json())
    .then((data) => {
      data.forEach((raza) => {
        razaMascota.innerHTML += `<option value="${raza.idRaza}">${raza.nombreRaza}</option>`;
      });
    });

  document.querySelector("#idMascotas").value = 0;
  frmMascotas.reset();
  $("#insertarMascotasModal").modal("show");
  document.getElementById("MascotaModalLabel").innerHTML = "Crear Mascota";
});

tablaMascotas = $("#tablaMascotas").dataTable({
  language: {
    url: `${base_url}/Assets/vendor/datatables/dataTables_es.json`,
  },
  ajax: {
    url: " " + base_url + "/mascotas/getMascotas",
    dataSrc: "",
  },
  columns: [
    { data: "nombreMascota" },
    { data: "nombreRaza" },
    { data: "edadMascota" },
    { data: "comentarioMascota" },
    { data: "nombre" },
    { data: "options" },
  ],
  responsive: "true",
  order: [[0, "asc"]],
});

frmMascotas.addEventListener("submit", (e) => {
  e.preventDefault();
  frmData = new FormData(frmMascotas);
  console.log(frmData);
  fetch(base_url + "/mascotas/setMascotas", {
    method: "POST",
    body: frmData,
  })
    .then((res) => res.json())
    .then((data) => {
      Swal.fire({
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

document.addEventListener("click", (e) => {
  try {
    let selected = e.target.closest("button").getAttribute("data-action-type");
    let idMascotas = e.target.closest("button").getAttribute("rel");

    //Eliminar mascota
    if (selected == "delete") {
      Swal.fire({
        title: "Eliminar Mascota",
        text: "¿Está seguro de eliminar la mascota?",
        icon: "warning",
        showDenyButton: true,
        confirmButtonText: "Sí",
        denyButtonText: `Cancelar`,
      }).then((result) => {
        if (result.isConfirmed) {
          let formData = new FormData();
          formData.append("idMascotas", idMascotas);
          fetch(base_url + "/mascotas/eliminarMascota", {
            method: "POST",
            body: formData,
          })
            .then((res) => res.json())
            .then((data) => {
              Swal.fire({
                title: data.status ? "Correcto" : "Error",
                text: data.msg,
                icon: data.status ? "success" : "error",
              });
              tablaMascotas.api().ajax.reload(function () {});
            });
        }
      });
    }
    //Actualizar mascota
    if (selected == "update") {
      $("#insertarMascotasModal").modal("show");
      document.getElementById("MascotaModalLabel").innerHTML =
        "Actualizar Mascota";
      fetch(base_url + `/mascotas/getMascota/${idMascotas}`, {
        method: "GET",
      })
        .then((res) => res.json())
        .then((res) => {
          arrData = res.data[0];
          console.log(arrData);
          nombreUsuario.innerHTML = `<option value="${arrData.idClientes}" selected>${arrData.nombre}</option>`;
          fetch(base_url + "/clientes/getClientes")
            .then((res) => res.json())
            .then((data) => {
              data.forEach((el) => {
                if (arrData.idClientes != el.idClientes) {
                  nombreUsuario.innerHTML += `<option value="${el.idClientes}">${el.nombre}</option>`;
                }
              });
            });
          fetch(base_url + "/razas/getRazas")
            .then((res) => res.json())
            .then((data) => {
              data.forEach((raza) => {
                if (arrData.idRaza != raza.idRaza) {
                  razaMascota.innerHTML += `<option value="${raza.idRaza}">${raza.nombreRaza}</option>`;
                }
              });
            });
          document.querySelector("#nombreMascota").value =
            arrData.nombreMascota;
          document.querySelector("#razaMascota").value = arrData.razaMascota;
          document.querySelector("#edadMascota").value = arrData.edadMascota;
          document.querySelector("#comentarioMascota").value =
            arrData.comentarioMascota;
          document.querySelector("#idMascotas").value = arrData.idMascotas;
        });
    }
  } catch {}
});

//

//traer modal de razas
nuevaRazaMascota.addEventListener("click", (e) => {
  //document.querySelector("#idRaza").value = 0;
  frmRazasMascotas.reset();
  $("#insertarRazaModal").modal("show");
  document.getElementById("razaModalLabel").innerHTML = "Crear raza";
  $("#insertarMascotasModal").modal("hide");
});

//agregar raza
frmRazasMascotas.addEventListener("submit", (e) => {
  e.preventDefault();
  frmData = new FormData(frmRazasMascotas);
  console.log(frmData);
  fetch(base_url + "/razas/setRaza", {
    method: "POST",
    body: frmData,
  })
    .then((res) => res.json())
    .then((data) => {
      Swal.fire({
        title: data.status ? "Correcto" : "Error",
        text: data.msg,
        icon: data.status ? "success" : "error",
      });
      if (data.status) {
        frmRazasMascotas.reset();
        $("#insertarRazaModal").modal("hide");
        $("#insertarMascotasModal").modal("show");
        razaMascota.innerHTML = `<option value="0" selected hidden">Seleccione la raza</option>`;
        fetch(base_url + "/razas/getRazas")
          .then((res) => res.json())
          .then((data) => {
            data.forEach((raza) => {
              razaMascota.innerHTML += `<option value="${raza.idRaza}">${raza.nombreRaza}</option>`;
            });
          });
      }
    });
});
