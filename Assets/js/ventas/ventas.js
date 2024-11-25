const btnNuevaVenta = document.querySelector('#btnNuevaVenta')
const btnAgregarItem = document.querySelector('#btnAgregarItem')
const btnAgregarMetodo = document.querySelector('#btnAgregarMetodo')
const txtCodigoSKU = document.querySelector('#txtCodigoSKU')
const productList = document.querySelector('#productList')

btnAgregarItem.addEventListener('click', ()=>{
    fetch(base_url + '/productos/getProductoByCode/' + txtCodigoSKU.value)
    .then((response) => response.json())
    .then((data) => {
        if(data.status){
            data = data.data[0]
            fntAgregarProducto(data)
            txtCodigoSKU.value = "";
        }else{
            txtCodigoSKU.value = "";
            $('#selectProductModal').modal('show')
        }
    })
})

btnAgregarMetodo.addEventListener('click', ()=>{
    //fetch busca metodo de pago info
})

function fntAgregarProducto(json){
    console.log(json)

    let html = `
    <div class="card mb-4 py-3 border-left-primary">
        <div class="card-body">
            ${json.nombreProducto} | $${json.precio} | disponible: ${json.cantidadProducto}
        </div>
    </div>
    ` 

    productList.innerHTML += html
}