<?php header_tienda($data);
 ?>
 <input type="hidden" id="idUsuario" value="<?= $_SESSION['userData']['id_persona'] ?>">
 <section class="py-5">
<div class="container px-4 px-lg-5 my-5 align-items-center">
<div class="row gx-4 gx-lg-5 align-items-center" id="printCart">

</div>
<div class="text-center">
    <a class="btn btn-outline-dark mt-auto" href="">pagar</a> 
</div>
    
</div>
</section>
 
<?php footer_tienda($data) ?> 
<script src="<?= media() ?>/js/carrito/carrito.js"></script>
