console.log("hello world");
const frmRazasMascotas = document.querySelector("#frmRazas");
const crearRazaModal = document.querySelector("#insertarRazaModal");
const badgeRaza = document.querySelector("#agregarNuevo");
const submitRaza = document.querySelector("#guardarRaza");
const cerrarRaza = document.querySelector("#cerrarRaza");
const razaMascotas = document.querySelector("#razaMascota");


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
        $("#insertarRazaModal").modal("hide");
        $("#insertarMascotasModal").modal("show");
        razaMascotas.innerHTML = `<option value="0" selected hidden">Seleccione la raza</option>`;
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