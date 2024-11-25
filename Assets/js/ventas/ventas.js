const btnNuevaVenta = document.querySelector('#btnNuevaVenta')
const btnAgregarItem = document.querySelector('#btnAgregarItem')
const btnAgregarMetodo = document.querySelector('#btnAgregarMetodo')
const txtCodigoSKU = document.querySelector('#txtCodigoSKU')
const productList = document.querySelector('#productList')
const frmVentas = document.querySelector('#frmVentas')
const metodoPagoZone = document.querySelector('#metodoPagoZone')
let btnAgregarProducto

let metodosCount = 0
let limiteMetodos = 0

fntLoadMetodosPago()

btnAgregarItem.addEventListener('click', ()=>{
    fetch(base_url + '/productos/getProductoByCode/' + txtCodigoSKU.value)
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
            fntLoadProductosModal()
        }
    })
})

btnAgregarMetodo.addEventListener('click', ()=>{
    //fetch busca metodo de pago info
    if (metodosCount >= limiteMetodos) {
        Swal.fire({
            title: "Atencion",
            text: `No se pueden agregar mas metodos`,
            icon: "warning"
        })
        console.log('nosepuede')
    }else{
        html = 
        `
            <div class="form-row">
                <div class="form-group col-md-3" >
                    <select name="metodoPago" id="metodoPago${metodosCount}" class="form-control">
                        <option value="0">Seleccionar Metodo de pago</option>
                    </select>
                </div>
            </div>
        `
        metodoPagoZone.innerHTML += html
        fntLoadMetodosPago()
    }
console.log('boton disparado')
})

document.addEventListener('click', (e)=>{
    
    try{
        if (e.target.getAttribute('data-action-type') == 'close') {
            let element = e.target.closest('div').parentElement
            element.remove()
        }
    }catch{}
})

frmVentas.addEventListener('submit', (e)=>{
    e.preventDefault()
})

function fntAgregarProducto(json){
    console.log(json)

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
                    $${json.precio} | disponible: ${json.cantidadProducto} Cantidad: <input type="text" class="form-control" value="1"/></div>
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
    console.log('funcion metodos activada')
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