const btnCrearRol = document.querySelector('#btnCrearRol')
const frmRol = document.querySelector("#frmRoles")
const crearRolModal = document.querySelector("#crearRolModal")
let tablaRol

document.addEventListener('DOMContentLoaded', ()=>{

    btnCrearRol.addEventListener('click', ()=>{
        console.log(frmRol)
        document.querySelector('#idRol').value = 0
        frmRol.reset()
        $('#crearRolModal').modal('show')
        document.getElementById('crearRolModalLabel').innerHTML = "Crear Rol"
    })
})