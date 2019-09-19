<!-- SweetAlert -->
<script src="<?= base_url('assets'); ?>/vendor/sweetalert/js/sweetalert.min.js"></script>
<!-- jQuery -->
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- jQuery Validate -->
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.validate.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?= base_url('assets'); ?>/vendor/metisMenu/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>
<!-- dataTables -->
<script src="<?= base_url('assets'); ?>/vendor/DataTables/datatables.min.js"></script>
<!-- Bootstrap Select -->
<script src="<?= base_url('assets'); ?>/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<!-- Bootstrap-datepicker JavaScript -->
<script src="<?= base_url('assets'); ?>/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

</body>

</html>

<script>
    $(document).ready(function() {
        $('.input-group.date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            enableOnReadonly: false
        });
    });
</script>