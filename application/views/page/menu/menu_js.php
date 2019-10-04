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
                },
                {
                    orderable: true,
                    width: '50px',
                    targets: [0]
                }
            ],

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
            drawCallback: function() {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
            },
            preDrawCallback: function() {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
            }
        });


        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        tm = $("#table-menu").DataTable({
            initComplete: function() {
                var api = this.api();
                $('#table-menu_filter input')
                    .off('.DT')
                    .on('input.DT', function() {
                        api.search(this.value).draw();
                    });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "<?= base_url() ?>cmenu/get_all_menu_ajax",
                "type": "POST"
            },
            columns: [{
                    "data": "id_menu"
                },
                {
                    "data": "label"
                },
                {
                    "data": "link"
                },
                {
                    "data": "icon",
                    "render": function(data) {
                        return '<i class="icon ' + data + '"></i>'
                    }
                },
                {
                    "data": "grup"
                },
                {
                    "data": "parent"
                },
                {
                    "data": "sort"
                },
                {
                    "data": "aksi"
                }
            ],
            order: [
                [0, 'desc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            },
            dom: '<"datatable-header"f <"col-md-7 btn-group"B>><"datatable-scroll"t><"datatable-footer"ipl>',
            buttons: [{
                text: '<button class="btn btn-danger"><i class="icon icon-add"></i> Menu</button>',
                action: function() {
                    clear_input();
                    $("#modal-menu").modal('show');
                }
            }, ]
        });

        // Add placeholder to the datatable filter option
        $('.dataTables_filter input[type=search]').attr('placeholder', 'Anggota...');


        // Enable Select2 select for the length option
        $('.dataTables_length select').select2({
            minimumResultsForSearch: "-1"
        });

        $("#simpan-menu").on('click', function() {
            var id = $("#id_menu").val();
            var label = $("#label").val();
            var link = $("#link").val();
            var icon = $("#icon").val();
            var grup = $("#group").val();
            var parent = $("#parent").val();
            var sort = $("#sort").val();
            $.ajax({
                url: '<?= base_url() ?>cmenu/simpan_menu/' + id,
                type: "POST",
                dataType: 'json',
                data: {
                    label: label,
                    link: link,
                    icon: icon,
                    group: grup,
                    parent: parent,
                    sort: sort
                },
                success: function(data) {
                    alert(data.pesan);
                    $("#modal-menu").modal('hide');
                    clear_input();
                    tm.ajax.reload();
                }
            });
        });

        $(document).on('click', '.edit-menu', function() {
            var id = $(this).attr('id');
            $.ajax({
                url: '<?= base_url() ?>cmenu/get_menu_by_id_ajax/' + id,
                type: 'POST',
                dataType: "json",
                success: function(data) {
                    $("#id_menu").val(data.id_menu);
                    $("#label").val(data.label);
                    $("#link").val(data.link);
                    $("#icon").val(data.icon);
                    $("#group").val(data.grup);
                    $("#parent").val(data.parent);
                    $("#sort").val(data.sort);
                    $("#modal-menu").modal('show');
                }
            });
        });

        $("#simpan-menu").on('click', function() {
            var id_menu = $("#id_menu").val();
            var label = $("#label").val();
            var link = $("#link").val();
            var icon = $("#icon").val();
            var grup = $("#group").val();
            var parent = $("#parent").val();
            var sort = $("#sort").val();

            $.ajax({
                url: '<?= base_url() ?>cmenu/simpan_menu/' + id_menu,
                type: 'POST',
                data: {
                    label: label,
                    link: link,
                    icon: icon,
                    group: grup,
                    parent: parent,
                    sort: sort
                },
                dataType: 'json',
                success: function(data) {
                    alert(data.pesan);
                    $("#modal-menu").modal('hide');
                    clear_input();
                    tm.ajax.reload();
                }
            });
        });

        $(document).on('click', '.hapus-menu', function() {
            var id = $(this).attr('id');
            if (confirm('Anda yakin ingin menghapus menu ini?')) {
                $.ajax({
                    url: '<?= base_url() ?>cmenu/hapus_menu/' + id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(data){
                        alert(data.pesan);
                        tm.ajax.reload();
                    }
                });
            }
        });
    });

    function clear_input() {
        $("#label").val('');
        $("#link").val('');
        $("#icon").val('');

        $("#sort").val('');
        $("#group").val('');
    }
</script>