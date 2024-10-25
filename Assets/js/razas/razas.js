console.log("hello world");
const frmRazas = document.querySelector("#frmRazas");
const crearRazaModal = document.querySelector("#insertarRazaModal");
const badgeRaza = document.querySelector("#agregarNuevo");
const submitRaza = document.querySelector("#guardarRaza");
const cerrarRaza = document.querySelector("#cerrarRaza");
let razaMascotas = document.querySelector("#razaMascota");

cerrarRaza.addEventListener("click", (e) => {
  $("#insertarRazaModal").modal("hide");
  $("#insertarMascotasModal").modal("show");
});

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
        $("#insertarRazaModal").modal("hide");
        $("#insertarMascotasModal").modal("show");
        razaMascota.innerHTML = `<option value="0" selected hidden">Seleccione la raza</option>`;
        fetch(base_url + "/razas/getRazas")
          .then((res) => res.json())
          .then((data) => {
            data.forEach((raza) => {
              razaMascotas.innerHTML += `<option value="${raza.idRaza}">${raza.nombreRaza}</option>`;
            });
          });
      }
    });
});

document.addEventListener("click", (e) => {
  try {
    let selected = e.target.closest("button").getAttribute("data-action-type");
    let idRaza = e.target.closest("button").getAttribute("rel");

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
            });
        }
      });
    }
    //Actualizar producto
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
