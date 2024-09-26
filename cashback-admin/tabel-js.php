
<script src="<?php echo $siteUrl;?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $siteUrl;?>assets/js/dataTables.bootstrap.min.js"></script>
 <!--<script src='https://code.jquery.com/jquery-3.5.1.js'></script>-->
<!--<script src='https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js'></script>-->
<!--<script src='https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js'></script>-->
<!--<script src='https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js'></script>-->
<!--<script src='https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap5.min.js'></script>-->
<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.j/s'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js'></script>
<!--<script src='https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js'></script>-->
<!--<script src='https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js'></script>-->
<!--<script src='https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js'></script>-->
<script>
    //   $(document).ready(function() {
    //     $('#datatable').dataTable();
    //     $('#datatable-keytable').DataTable({
    //       keys: true
    //     });

    //     $('#datatable-responsive').DataTable();

    //     $('#datatable-scroller').DataTable({
    //       ajax: "js/datatables/json/scroller-demo.json",
    //       deferRender: true,
    //       scrollY: 380,
    //       scrollCollapse: true,
    //       scroller: true
    //     });
    //   });
    
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: true,
        buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} ); 
$(document).ready(function() {
    var table = $('#datatable').DataTable( {
        lengthChange: true,
        buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );

</script>
