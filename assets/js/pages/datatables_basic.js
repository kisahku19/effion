/* ------------------------------------------------------------------------------
*
*  # Basic datatables
*
*  Specific JS code additions for datatable_basic.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 5 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });


    // Basic datatable
    

    $('#table_customer').DataTable({
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.

                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": "<?php echo site_url('customer/ajax_list') ?>",
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columnDefs": [
                        {
                            "targets": [-1], //last column
                            "orderable": false, //set not orderable
                        },
                        {
                            "targets": [-2], //2 last column (photo)
                            "orderable": false, //set not orderable
                        },
                    ],
                });
    // Alternative pagination
    $('.datatable-pagination').DataTable({
        pagingType: "simple",
        language: {
            paginate: {'next': 'Next &rarr;', 'previous': '&larr; Prev'}
        }
    });


    // Datatable with saving state
    $('.datatable-save-state').DataTable({
        stateSave: true
    });


    // Scrollable datatable
    $('.datatable-scroll-y').DataTable({
        autoWidth: true,
        scrollY: 300
    });



    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: "-1"
    });
    
});
