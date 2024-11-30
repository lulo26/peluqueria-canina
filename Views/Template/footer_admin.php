
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2024</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ya nos dejas Firulais?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Si es asi, presiona Salir para Cerrar Sesion!!</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="<?= base_url(); ?>/logout">Salir</a>
            </div>
        </div>
    </div>
</div>


    <script>const base_url = "<?= base_url() ?>";</script>
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?= media() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= media() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= media() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= media() ?>/js/sb-admin-2.min.js"></script>
    <!-- alerts-->
    <script src="<?= media() ?>/vendor/sweetAlert2/sweetalert2.all.min.js"></script>
    <!-- dataTables-->
    <script src="<?= media() ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= media() ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Script Global del proyecto -->
    <script src="<?= media() ?>/js/script.js"></script>
    <!-- Script seteado de cada Controller -->
    <script src="<?= media(); ?>/js/<?= $data['page_functions_js'] ?>"></script>
    <!-- Charts --->
    <?php if ($data['page_id_name'] == "informes"): ?>
        <script src="<?= media() ?>/vendor/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?= media() ?>/vendor/chart.js/Chart.min.js"></script>
        <script src="<?= media() ?>/vendor/chart.js/Chart.js"></script>
        <script src="<?= media() ?>/vendor/chart.js/Chart.bundle.min.js"></script>
        <script src="<?= media() ?>/vendor/chart.js/Chart.bundle.js"></script>
    <?php endif ?>

    <!--Box Icons-->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</body>

</html>