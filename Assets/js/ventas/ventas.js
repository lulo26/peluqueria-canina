const btnRegistrar = document.querySelector('#btnRegistrar')
const btnAgregarItem = document.querySelector('#btnAgregarItem')
const btnAgregarMetodo = document.querySelector('#btnAgregarMetodo')
const btnAgregarCliente = document.querySelector('#btnAgregarCliente')
const txtCodigoSKU = document.querySelector('#txtCodigoSKU')
const txtCliente = document.querySelector('#txtCliente')
const productList = document.querySelector('#productList')
const frmVentas = document.querySelector('#frmVentas')
const metodoPagoZone = document.querySelector('#metodoPagoZone')
const addClientZone = document.querySelector('#addClientZone')
let btnAgregarProducto
let tablaProductos = null
let tablaClientes = null
let productItems
let clientSelected = false

let metodosCount = 0
let limiteMetodos = 0

fntLoadMetodosPago()

document.addEventListener('focusout', (e)=>{
    if (e.target.getAttribute('class') == "form-control target-cantidad") {
        let stock = e.target.getAttribute('data-item-stock')
        let value = e.target.value
        if (value > stock) {
            e.target.value = stock
        }
        if (value < 0 || isNaN(value)) {
            console.log(typeof value)
            console.log('el valor es: ' + value)
            e.target.value = 1
        }
    }
    
})

btnRegistrar.addEventListener('click', ()=>{
    frmData = new FormData(frmVentas)
    fetch(base_url + '/ventas/setVenta', {
        method: "POST",
        body: frmData
    })
    .then((res) => console.log(res))
})

btnAgregarCliente.addEventListener('click', ()=>{
    fntAgregarCliente(txtCliente.value)
})

btnAgregarItem.addEventListener('click', ()=>{
    value = txtCodigoSKU.value
    fntAgregarItem(value)
})
txtCodigoSKU.addEventListener('keypress', (e) =>{
    if (e.key == 'Enter') {
        value = txtCodigoSKU.value
        fntAgregarItem(value)
    }
})
txtCliente.addEventListener('keypress', (e) =>{
    if (e.key == 'Enter') {
        value = txtCliente.value
        fntAgregarCliente(value)
    }
})

btnAgregarMetodo.addEventListener('click', ()=>{

    if (metodosCount >= limiteMetodos) {
        Swal.fire({
            title: "Atencion",
            text: `No se pueden agregar mas metodos`,
            icon: "warning"
        })
    }else{
        html = 
        `
            <div class="form-row" id="formMethod${metodosCount}">
                <div class="form-group col-md-3" >
                    <select name="metodoPago[]" id="metodoPago${metodosCount}" class="form-control">
                        <option value="0">Seleccionar Metodo de pago</option>
                    </select>
                </div>
                <button data-action-id="${metodosCount}" data-action-type="deleteMethod" type="button" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
            </div>
        `
        metodoPagoZone.innerHTML += html
        fntLoadMetodosPago()
    }
})

document.addEventListener('click', (e)=>{
    
    try{
        if (e.target.getAttribute('data-action-type') == 'close') {
            let element = e.target.closest('div').parentElement
            element.remove()
        }
        if (e.target.closest('button').getAttribute('data-action-type') == 'deleteMethod') {
            console.log('eliminar metodo')
            let idMethod = e.target.closest('button').getAttribute('data-action-id')
            let element = document.querySelector(`#formMethod${idMethod}`)
            element.remove()
            metodosCount--
        }

        if (e.target.closest('button').getAttribute('data-action-type') == 'AddProduct') {
            let codigo =  e.target.closest('button').getAttribute('data-action-sku')
            fntAgregarItem(codigo)
        }

        if (e.target.closest('button').getAttribute('data-action-type') == 'addCliente') {
            let identidad =  e.target.closest('button').getAttribute('data-action-identidad')
            fntAgregarCliente(identidad)
        }
    }catch{}
})

frmVentas.addEventListener('submit', (e)=>{
    e.preventDefault()
    
})

function fntAgregarCliente(value){

    fetch(base_url + '/clientes/getClientByIdentification/'+ value)
    .then((res) => res.json())
    .then((data) => {
        if (data.status) {
            data = data.data[0]
            fntAgregarClienteHtml(data)
            clientSelected = true
        }else{
            txtCliente.value=""
            $('#selectClienteModal').modal('show')
            tablaClientes == null ? fntLoadClientesModal() : "" 
        }
    })
}


function fntAgregarItem(value){
    fetch(base_url + '/productos/getProductoByCode/' + value)
    .then((response) => response.json())
    .then((data) => {
        if(data.status){
            data = data.data[0]
            if (data.cantidadProducto <= 0) {
                Swal.fire({
                    title: "Atencion",
                    text: `Stock del producto: ${data.nombreProducto} agotado`,
                    icon: "warning"
                })
            }else{
                if (fntBuscarProducto(data)) {
                    let producto = document.querySelector('#p'+data.idInventario)
                    let cantidad = producto.getElementsByTagName('input')
                    let contador = parseInt(cantidad[0].value)
                    contador++
                    if (data.cantidadProducto < contador) {
                        Swal.fire({
                            title: "Atencion",
                            text: `La cantidad seleccionada supera el stock del producto`,
                            icon: "warning"
                        })
                    }else{
                        cantidad[0].value = contador
                    }
                }else{
                    fntAgregarProducto(data)
                }
            }
            txtCodigoSKU.value = "";
        }else{
            txtCodigoSKU.value = "";
            $('#selectProductModal').modal('show')
            if (tablaProductos == null) {
                fntLoadProductosModal()
            }
        }
    })
}

function fntAgregarClienteHtml(cliente){
    let html = `
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <input name="cliente" type="hidden" value="${cliente.identificacion}">
            <strong>${cliente.nombre}</strong> ${cliente.apellido} | ${cliente.identificacion}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `
    addClientZone.innerHTML = html   
}

function fntAgregarProducto(json){

    let html = 
    `
        <div class="card product mb-4" id="p${json.idInventario}">
            <div class="card-header">
                <strong>${json.nombreProducto}</strong>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true" data-action-type="close">×</span>
                </button>
            </div>
            <div class="card-body">
                <div class="form-row">
                    $${json.precio} | disponible: ${json.cantidadProducto} Cantidad: <input name="producto['${json.idInventario}']" data-item-stock="${json.cantidadProducto}" type="text" class="form-control target-cantidad" value="1"/></div>
                </div>
            </div>
        </div>
    `

    productList.innerHTML += html
}

function fntBuscarProducto(json){
    let respuesta = false
    let id = json.idInventario
    let cards = document.getElementsByClassName('product')
    var arrCards = Array.prototype.slice.call(cards)
    arrCards.forEach(el => {
        if ('p'+id == el.getAttribute('id')) {
            respuesta = true
        }
    });
    return respuesta
}

function fntLoadMetodosPago(){
    fetch(base_url + '/ventas/getPaymentMethods')
    .then((response) => response.json())
    .then((data) => {
        if (data.status) {
            data = data.data
            limiteMetodos = data.length
            let metodoPago = document.querySelector('#metodoPago'+metodosCount)
            let html
            data.forEach((el)=>{
                html += `
                    <option value="${el.id_metodo_pago}">${el.nombre}</option>
                `
            })
            metodoPago.innerHTML += html
            metodosCount++
        }
    })
}

function fntLoadClientesModal(){
    console.log('funcion disparada')
    tablaClientes = $('#clienteTable').dataTable({
        "language": {
            "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
        },
        "ajax":{
            "url": " "+base_url+"/clientes/getClientesSale",
            "dataSrc":""
        },
        "columns":[
            {"data":"identificacion"},
            {"data":"nombre"},
            {"data":"apellido"},
            {"data":"action"}
        ],
        "responsive": "true",
        "order":[[0, "asc"]]
    }) 
}

function fntLoadProductosModal(){

    tablaProductos = $('#productTable').dataTable({
        "language": {
            "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
        },
        "ajax":{
            "url": " "+base_url+"/productos/getProductSale",
            "dataSrc":""
        },
        "columns":[
            {"data":"codigoSKU"},
            {"data":"nombreProducto"},
            {"data":"precio"},
            {"data":"cantidadProducto"},
            {"data":"action"}
        ],
        "responsive": "true",
        "order":[[0, "asc"]]
    }) 
}