<script type="text/javascript">
    $(function() {
        $('#example1').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
</script>