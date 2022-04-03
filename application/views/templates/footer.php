<!-- Jquery JS-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="<?= base_url('assets/'); ?>vendor/bootstrap-4.1/popper.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="<?= base_url('assets/'); ?>vendor/slick/slick.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/wow/wow.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/animsition/animsition.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="<?= base_url('assets/'); ?>vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="<?= base_url('assets/'); ?>vendor/circle-progress/circle-progress.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/chartjs/Chart.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/select2/select2.min.js">
</script>

<script src="<?= base_url('assets/'); ?>vendor/rupiah/rupiah.js"></script>

<!-- Main JS-->
<script src="<?= base_url('assets/'); ?>js/main.js"></script>

<script>
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: "post",
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId
            }
        });
    });
</script>

</body>

</html>
<!-- end document-->