<?php header_tienda($data);

//$data[''] 
?>


       <!-- Product section-->
       <section class="py-5" id="productoShow">
       

       <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?= base_url() ?>/<?= $data[0]['imagen_productos'] ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: <?= $data[0]['codigoSKU'] ?></div>
                        <h1 class="display-5 fw-bolder"><?= $data[0]['nombreProducto'] ?></h1>
                        <div class="fs-5 mb-5">
                            <span>$<?= $data[0]['precio'] ?></span>
                        </div>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="<?= $data[0]['cantidadProducto'] ?>" style="max-width: 3rem" />
                            <a href="" class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>

       </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" id="relatedCards">
                    
                </div>
            </div>
        </section>

<?php footer_tienda($data) ?> 
<script>
let idProducto = <?php $data['idInventario']; ?> 
</script>
<script src="<?= media() ?>/js/tienda/productoTienda.js"></script>