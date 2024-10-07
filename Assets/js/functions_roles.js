var tableRoles;

document.addEventListener('DOMContentLoaded', function(){
    tableRoles = $('#tableRoles').dataTable({
        "aProcessing": true,
        "aSercerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "ajax":{
            "url": " "+base_url+"/Roles/getRoles",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_rol"},
            {"data":"nombre_rol"},
            {"data":"descripcion"},
            {"data":"status"},
            {"data":"options"}
        ],
        "responsive": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0, "asc"]]
    });

    var formRol = document.querySelector('#formRol');
    formRol.onsubmit = function(e){
        e.preventDefault();
        var intIdRol = document.querySelector('#idRol').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var intStatus = document.querySelector('#listStatus').value;
        if(strNombre == '' || strDescripcion == '' || intStatus == ''){
            msg("Atencion", "Todos los campos son obligatorios", "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Roles/setRol';
        var formData = new FormData(formRol);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function(){

            if(request.readyState == 4 && request.status == 200){

                var objData = JSON.parse(request.responseText);
                console.log(objData);
                if(objData.status){
                    closeModal('modalRoles');
                    formRol.reset();
                    msg('Roles de usuario', objData.msg, 'success');
                    tableRoles.api().ajax.reload(function(){});
                }else{
                    console.log(objData.status);
                    msg('Error', objData.msg, 'error');
                }

            }
        } 
    }

});

function openModal(){
    document.querySelector('#titleModal').innerHTML = 'Nuevo Rol';
    document.querySelector('.modal-header').classList.replace('headerUpdate', 'headerRegister');
    document.querySelector('#titleIcon').classList.replace('fa-pen', 'fa-circle-plus');
    document.querySelector('#btnText').innerHTML = "Aceptar";
    document.querySelector("#idRol").value = "";
    document.querySelector("#txtNombre").value = "";
    document.querySelector("#txtDescripcion").value = "";
    document.querySelector("#listStatus").innerHTML = `
    <option value="2">Inactivo</option>
    <option value="1">Activo</option>
    `;
    modal("modalRoles");
}

document.addEventListener('click', function(e) {
    e = e || window.event;
    var target = e.target || e.srcElement, text = target.textContent || target.innerText;

    try {
        if (target.closest("a").classList.contains("btnEditRol")) {
            document.querySelector('#titleModal').innerHTML = 'Actualizar Rol';
            document.querySelector('.modal-header').classList.replace('headerRegister', 'headerUpdate');
            document.querySelector('#titleIcon').classList.replace('fa-circle-plus', 'fa-pen');
            document.querySelector('#btnText').innerHTML = "Actualizar";
            //console.log(target.closest("a").classList.contains("btnEditRol"));
            //aqui se continua el script pa obtener datos del rol

            var idrol = target.closest("a").getAttribute('rel');
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Roles/getRol/'+idrol;
            console.log("idRol: "+idrol);
            request.open("GET", ajaxUrl, true);
            request.send();

            request.onreadystatechange = function(){
                if(request.readyState == 4 &&  request.status == 200){
                    var objData = JSON.parse(request.responseText);

                    if(objData.status){
                        document.querySelector("#idRol").value = objData.data.id_rol;
                        document.querySelector("#txtNombre").value = objData.data.nombre_rol;
                        document.querySelector("#txtDescripcion").value = objData.data.descripcion;

                        if(objData.data.status == 1){
                            var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                        }else{
                            var optionSelect = '<option value="1" selected class="notBlock">Inactivo</option>';
                        }

                        var htmlSelect = `${optionSelect}
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                            `;
                        document.querySelector("#listStatus").innerHTML = htmlSelect;
                        modal("modalRoles");
                    }else{
                        console.log("Actualizar: "+objData.status);
                        msg('Error', objData.msg, 'error');
                    }
                }
            }

            modal("modalRoles");
        }
    } catch(error){
        //console.log('trycach error: '+error)
    }
}, false);

document.addEventListener('click', function(e) {
    e = e || window.event;
    var target = e.target || e.srcElement, text = target.textContent || target.innerText;

    try {
        if (target.closest("a").classList.contains("btnDelRol")) {
            idrol = target.closest("a").getAttribute('rel');
            //msg('Eliminar Rol', '¿Realmente quiere eliminar el rol? ', 'warning');
            swal({
                title: "Eliminar Rol",
                text: "Realmente quiere eliminar el rol?",
                type: "warning",
                showCancelButton:true,
                confirmButtonText:"Si, eliminar",
                cancelButtonText:"Cancelar",
                closeOnConfirm:true,
                closeOnCancel:true
            }, function(){
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxDelRol = base_url+'/Roles/delRol/';
                var strData = "idrol="+idrol;
                request.open("POST", ajaxDelRol, true);
                request.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                request.send(strData);
                request.onreadystatechange = function(){
                    if(request.readyState == 4 && request.status == 200){
                        var objData = JSON.parse(request.responseText);
                        //console.log(objData);
                        if(objData.status){
                            msg("Eliminar", objData.msg, "success");
                            tableRoles.api().ajax.reload(function(){

                            });
                        }else{
                            msg("Atención", objData.msg, "error");
                        }
                    }
                }
            });
        }
    } catch(error){
    }
}, false);


document.addEventListener('click', function(e) {
    e = e || window.event;
    var target = e.target || e.srcElement, text = target.textContent || target.innerText;

    try {
        if (target.closest("a").classList.contains("btnPermisosRol")) {
            idrol = target.closest("a").getAttribute('rel');
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Permisos/getPermisosRol/'+idrol;
            request.open("GET", ajaxUrl, true);
            request.send();

            request.onreadystatechange = () => {
                if(request.readyState == 4 && request.status == 200){
                    document.querySelector('#contentAjax').innerHTML = request.responseText;
                    modal('modalPermisos');
                    document.querySelector('#formPermisos').addEventListener('submit', fntSavePermisos, false);
                }
            }
        }
    } catch(error){
    }
}, false);

function fntSavePermisos(event){

    event.preventDefault();
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Permisos/setPermisos/';
    var formElement = document.querySelector('#formPermisos');
    var formData = new FormData(formElement);
    request.open("POST", ajaxUrl, true);
    request.send(formData);
    

    request.onreadystatechange = () =>{
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                msg("Permisos de usuario", objData.msg, "succsess")
            }else{
                msg("Error", objData.msg, "error")
            }
        }
    }
}