const frmRazas = document.querySelector("#frmRazas");
const razaModal = document.querySelector("#insertarRazaModal");
let tablaRazas = document.querySelector("#tablaRazas");
const razas = document.querySelector("#razaMascota");

//tabla razas
tablaRazas = $("#tablaRazas").dataTable({
  language: {
    url: `${base_url}/Assets/vendor/datatables/dataTables_es.json`,
  },
  ajax: {
    url: " " + base_url + "/razas/getRazas",
    dataSrc: "",
  },
  columns: [{ data: "nombreRaza" }, { data: "sizeRaza" }, { data: "options" }],
  responsive: "true",
  order: [[0, "asc"]],
});

//agregar raza
frmRazas.addEventListener("submit", (e) => {
  e.preventDefault();
  frmData = new FormData(frmRazas);
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
        frmRazas.reset();
        $("#insertarRazaModal").modal("hide");
        tablaRazas.api().ajax.reload(function () {});
      }
    });
});

document.addEventListener("click", (e) => {
  try {
    let selected = e.target.closest("button").getAttribute("data-action-type");
    let idRaza = e.target.closest("button").getAttribute("rel");

    //Eliminar raza
    if (selected == "delete") {
      Swal.fire({
        title: "Eliminar raza de perro?",
        text: "¿Está seguro de eliminar la raza?",
        icon: "warning",
        showDenyButton: true,
        confirmButtonText: "Sí",
        denyButtonText: `Cancelar`,
      }).then((result) => {
        if (result.isConfirmed) {
          let formData = new FormData();
          formData.append("idRaza", idRaza);
          fetch(base_url + "/razas/eliminarRaza", {
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
              tablaRazas.api().ajax.reload(function () {});
            });
        }
      });
    }
    //Actualizar raza
    if (selected == "update") {
      $("#insertarRazaModal").modal("show");
      document.getElementById("razaModalLabel").innerHTML = "Actualizar raza";
      fetch(base_url + `/razas/getRaza/${idRaza}`, {
        method: "GET",
      })
        .then((res) => res.json())
        .then((res) => {
          arrData = res.data[0];
          console.log(arrData);
          document.querySelector("#nombreRaza").value = arrData.nombreRaza;
          document.querySelector("#sizeRaza").value = arrData.sizeRaza;
          document.querySelector("#idRaza").value = arrData.idRaza;
        });
    }
  } catch {}
});
