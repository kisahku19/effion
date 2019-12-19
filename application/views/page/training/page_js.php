<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/editors/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/editors/wysihtml5/toolbar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/editors/wysihtml5/parsers.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/editors/wysihtml5/locales/bootstrap-wysihtml5.ua-UA.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/core/libraries/jquery_ui/datepicker.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/core/libraries/jquery_ui/effects.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/ui/moment/moment.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/pickers/daterangepicker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/pickers/anytime.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/pickers/pickadate/picker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/pickers/pickadate/legacy.js"></script>
<script type="text/javascript">
    $(function() {
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{
                orderable: false,
                width: '150px',
                targets: [6]
            }],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': '&rarr;',
                    'previous': '&larr;'
                }
            },
            drawCallback: function() {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
            },
            preDrawCallback: function() {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
            }
        });

        var ta = $("#table-training").DataTable({

        });

        $('.dataTables_filter input[type=search]').attr('placeholder', 'search...');


        // Enable Select2 select for the length option
        $('.dataTables_length select').select2({
            minimumResultsForSearch: "-1"
        });

        $(document).on('click', '.hapus-training', function() {
            var id = $(this).attr('id');
            if (confirm('Anda yakin ingin menghapus training')) {
                $.ajax({
                    url: '<?= base_url() ?>training/hapus_training_ajax/' + id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        alert(data.pesan);
                        location.reload();
                    }
                });
            }
        });
        $('#keterangan').wysihtml5({
            parserRules: wysihtml5ParserRules
        });
        $('#tanggal').pickadate({
            format: 'dd-mm-yyyy',
            formatSubmit: 'yyyy-mm-dd',
        });
    });
</script>