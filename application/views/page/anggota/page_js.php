<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/button/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/zip/jszip.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/pdf/pdfmake.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/pdf/vfs_fonts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/button/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/button/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/inputs/formatter.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/validator/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/inputs/formatter.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/uploaders/fileinput.min.js"></script>
<script type="text/javascript">
    $(function() {
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{
                orderable: false,
                width: '150px',
                targets: [7]
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

        var ta = $("#table-anggota").DataTable({

        });

        $('.dataTables_filter input[type=search]').attr('placeholder', 'search...');


        // Enable Select2 select for the length option
        $('.dataTables_length select').select2({
            minimumResultsForSearch: "-1"
        });

        $(document).on('click', '.hapus-anggota', function() {
            var id = $(this).attr('id');
            if (confirm('Anda yakin ingin menghapus anggota')) {
                $.ajax({
                    url: '<?= base_url() ?>anggota/hapus_anggota_ajax/' + id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        alert(data.pesan);
                        location.reload();
                    }
                });
            }
        });
    });
</script>