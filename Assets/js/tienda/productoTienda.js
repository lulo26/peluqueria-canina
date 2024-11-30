console.log(".... . ._.. ._.. ___ / .__ ___ ._. ._.. _..");

fetch(base_url+"/tienda/productoTienda" + idProducto)
  .then((res) => res.json())
  .then((data) => { data = data.data
    console.log(data);
      document.getElementById("productoShow").innerHTML += `
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="${data.imagen_productos}" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: ${data.codigoSKU}</div>
                        <h1 class="display-5 fw-bolder">${data.nombreProducto}</h1>
                        <div class="fs-5 mb-5">
                            <span>${data.precio}</span>
                        </div>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>`;
    });



/*   */