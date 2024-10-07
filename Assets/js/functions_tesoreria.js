document.addEventListener('DOMContentLoaded', function(){
    let registerZone = document.getElementById('registerZone');
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/tesoreria/getPaymentOrders/';
    request.onload = function(){
        var objData = JSON.parse(this.responseText);

        objData.forEach(item => {
            registerZone.innerHTML += `
            <div class="rbox">
                <div class="rdate">Pagar antes del: ${item.fecha_limite}</div>
                <div class="rbox_flexZone">
                    <div class="dataZone">
                        <div class="rname">${item.nombre}</div>
                        <span class="rpayment">Total cobro: ${item.total_a_pagar}</span>
                        <span class="rpayment">Abonado: ${item.abonado}</span>
                        <span class="rpayment">Por pagar: ${item.por_pagar}</span>
                    </div>
    
                    <div class="actionZone">
                        <button class="btn" onclick="openDetailModal('${item.id}')"><i class="fa-solid fa-circle-plus"></i></button>
                        <button class="btn"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>
            </div>
            `;
        });
    }
    request.open("GET", ajaxUrl, true);
    request.send();
    
});

function openModal(){
    modal('modalTesoreria_1');
}

function openDetailModal(id){
    let html = document.getElementById('paymentInfo');
    let idPaymentOrder = id;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/tesoreria/getPaymentOrder/'+idPaymentOrder;
    request.onload = function(){
        var objData = JSON.parse(request.responseText);
        var objData = objData.data;
        console.log(objData);
        html.innerHTML = `
        <div class="paymentDate">Fecha limite de pago:${objData.fecha_limite}</div>
        <div class="paymentName"><b>${objData.nombre}</b></div>
        <div class="paymentCorpInfo">
          <span class="corpName">Entidad:${objData.entidad}</span>
          <span class="paymentNumber">Numero de pago:${objData.numero_de_pago}</span>
        </div>
        <div class="paymentAbonado">Abonado:${objData.abonado}</div>
        <div class="paymentPorPagar">Por pagar:${objData.por_pagar}</div>
        <div class="paymentTotal">TOTAL:${objData.total_a_pagar}</div>
        <button class="btn" onclick="abonarModal('${objData.nombre}')">Abonar<button>
        <button class="btn">Modificar<button>
        `;
    }
    request.open("GET", ajaxUrl, true);
    request.send();
    modal('modalTesoreria_mas');
}

function abonarModal(abonoName){
    let abonoNameZone = document.getElementById('abonoNameZone');
    abonoNameZone.innerHTML = abonoName;
    closeModal('modalTesoreria_mas');
    modal('modalTesoreria_abonar');
}


var formOrden = document.querySelector('#formOrden');
formOrden.onsubmit = function(e){
    e.preventDefault();

    var strNombre = document.querySelector('#txtNombre').value;
    var strFecha_limite = document.querySelector('#fecha_limite').value;
    var intTotal_a_pagar = document.querySelector('#total_a_pagar').value;

    if(strNombre == '' || strFecha_limite == '' || intTotal_a_pagar == ''){
        msg("Atencion", "Hay campos requeridos a completar*", "error");
        return false;
    }
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/tesoreria/setOrder/';
    var formData = new FormData(formOrden);
    console.log(request);
    request.onload = function(){
        var objData = JSON.parse(this.responseText);
        console.log(objData);
    }
    request.open("POST", ajaxUrl, true);
    request.send(formData);
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){

            var objData = JSON.parse(request.responseText);
            
            if(objData.status){
                closeModal('modalTesoreria_1');
                formOrden.reset();
                msg('Orden de pago', objData.msg, 'success');
                //tableRoles.api().ajax.reload(function(){});
            }else{
                console.log(objData.status);
                msg('Error', objData.msg, 'error');
            }

        }
    } 
}