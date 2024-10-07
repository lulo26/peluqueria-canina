let toggleState = false;
let dropdown = document.getElementsByClassName('dropdown-btn');
let dropState = false;

function toggleMenu(){
    let toggle = document.querySelector('.toggle');
    let aside = document.querySelector('.navigation');
    let main = document.querySelector('.main');

    toggle.classList.toggle('active');
    aside.classList.toggle('active');
    main.classList.toggle('active');

    for(i = 0; i < dropdown.length; i++){
        dropdown[i].classList.remove('active');
        let dropdownContent = dropdown[i].nextElementSibling;
        dropdownContent.style.display = "none";
    }

    toggleState == true ? toggleState = false : toggleState = true;
}

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    toggleState == false ? this.classList.toggle("active"): null ;
    let dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      dropState = false;
    } else if (!toggleState){
      dropdownContent.style.display = "block";
      dropState = true;
    }
  });
}

function userDropdown() {
  document.getElementById("theDropdown").classList.toggle("show");
}

function btnDropdown(id){
  document.getElementById(id).classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }

  if(event.target.matches('.close')){
    if(event.target.parentElement.parentElement.parentElement.classList.contains('modal')){
      event.target.parentElement.parentElement.parentElement.style.display = "none";
    }else if(event.target.parentElement.parentElement.parentElement.parentElement.classList.contains('modal')){
      event.target.parentElement.parentElement.parentElement.parentElement.style.display = "none";
    }else{

    }
  }

  if(event.target.matches('.slider')){
    let slider = event.target.classList
    if(slider.contains('checked')){
      slider.remove('checked')
    }else{
      slider.toggle('checked')
    }
  }
/* CODIGO QUE CIERRA EL MODAL HACIENDO CLIC EN LA SOMBRA
  for(i = 0; i < modals.length; i++){
    if (event.target == modals[i]) {
      modals[i].style.display = "none";
    }
  }
*/
}


//MODAL

let modals;
modals = document.getElementsByClassName('modal');

function modal(modalId){
  let modal = document.getElementById(modalId);
  modal.style.display = "flex";
}

function closeModal(modalId){
  let modal = document.getElementById(modalId);
  modal.style.display = "none";
}

//msg function

function msg(title, message, type){
  let theId = title.concat(type);
  theId = theId.replaceAll(/\s/g,'');
  elementExistValidation = document.getElementById(theId);

  if(elementExistValidation == undefined){
    messageAlert = document.createElement('div');
    messageAlert.id = theId;
    messageAlert.innerHTML =
  
    `<div id="alert_${theId}" class="modal">`+
      `<div class="modal-content">`+
        `<div class="modal-header">`+
          `<span class="close_msg" onclick="close_msg('${theId}')"></span>`+
          `<h2 class="title">${title}</h2>`+
          `<span class="${type}"></span>`+
        `</div>`+
  
        `<p>${message}</p>`+
  
        `<div class="modal-footer">`+
          `<button class="btn close_msg" onclick="close_msg('${theId}')" type="button">Aceptar</button>`+
        `</div>`+
  
      `</div>`+
    `</div>`;
    document.body.appendChild(messageAlert);
  }

  modal(`alert_${theId}`);
  
}

function close_msg(id){
  let msgElement = document.getElementById(id);
  msgElement.remove();
}

// funcion para mensajes con configuracion en JSON

function swal(json, thefunction = ""){
  var swalId = "swal";
  var idExist = document.getElementById(swalId);

  if(idExist == null){
    executeSwal(swalId);
  }else{
    let i = 0;
    while(idExist != null){
      counterId = swalId+i;
      idExist = document.getElementById(counterId);
      i++;
    }
    swalId = counterId;
    executeSwal(swalId);
  }

  function executeSwal(id){
    swalElement = document.createElement('div');
    swalElement.innerHTML = `
    <div id="${id}" class="modal">
      <div class="modal-content">

        <div class="modal-header">
          <span class="close"></span>
          <h2 class="title">${(json.title != undefined) ? json.title : ""}</h2>
          <span class="${json.type}"></span>
        </div>
        
        <p>${(json.text != undefined) ? json.text : ""}</p>

        <div class="modal-footer">
          <button id="confirm_${id}" class="btn" type="button">${(json.confirmButtonText != undefined) ?  json.confirmButtonText : "Aceptar" }</button>
          ${json.showCancelButton ? `<button class="btn btn-secondary" ${json.closeOnCancel ? `onclick="close_msg('${id}')"` : ""} type="button">${(json.cancelButtonText != undefined) ? json.cancelButtonText : "Cancelar" }</button>` : ""}
        </div>

      </div>
    </div>
    `;
    document.body.appendChild(swalElement);
    modal(id);
    confirmButtonElement = document.getElementById('confirm_'+id);
    confirmButtonElement.onclick = () =>{
      (thefunction != "") ? thefunction() : "";
      close_msg(id);
      
    }
  }
}
