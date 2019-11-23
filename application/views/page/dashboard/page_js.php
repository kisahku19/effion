<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/button/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/zip/jszip.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/pdf/pdfmake.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/pdf/vfs_fonts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/button/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/button/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/charts/morris/raphael.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/charts/morris/morris.min.js"></script>
<script type="text/javascript">
    $(function() {
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"f><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Cari:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': '&rarr;',
                    'previous': '&larr;'
                }
            },
            order: [
                [0, 'desc']
            ],
            drawCallback: function() {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
            },
            preDrawCallback: function() {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
            }
        });
        $("#table-dashboard-tagihan").dataTable();
        $('.dataTables_filter input[type=search]').attr('placeholder', 'Kode Tagihan...');
    });
</script>