<?php header_admin($data); ?>
<?php getModal('modalRoles', $data); ?>
<div id="contentAjax"></div>
<div class="lbox">
    <h2><?= $data['page_title'] ?><button onclick="openModal()" class="btn"><i class="fa-solid fa-circle-plus"></i> Nuevo</button></h2>
    <hr>
    <p>Aquí irán los roles de usuarios</p>
    <table id="tableRoles" class="datatable">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Estatus</td>
                <td>accion</td>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script src="<?= media() ?>/js/functions_roles.js"></script>
<?php footer_admin($data) ?>