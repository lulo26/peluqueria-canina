const frmMascotas = document.querySelector("#frmMascotas");
const crearProductoModal = document.querySelector("#insertarMascotasModal");
const nombreUsuario = document.querySelector("#nombreUsuario");
let selectMascotas;
let tablaMascotas;

document.addEventListener("DOMContentLoaded", () => {
  frmMascotas.addEventListener("submit", (e) => {
    e.preventDefault();
    frmData = new FormData(frmMascotas);
    fetch(base_url + "/mascotas/setMascotas", {
      method: "POST",
      body: frmData,
    })
      .then((res) => res.json())
      .then((data) => {
        console.log(data);
        Swal.fire({
          title: data.status ? "Correcto" : "Error",
          text: data.msg,
          icon: data.status ? "success" : "error",
        });
        if (data.status) {
          frmMascotas.reset();
          $("#insertarMascotasModal").modal("hide");
          //tablaProductos.api().ajax.reload(function () {});
        }
      });
  });
});
