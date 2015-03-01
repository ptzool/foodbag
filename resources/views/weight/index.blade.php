@extends('layouts.user.master')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Weight History</h3>

        </div>
        <div class="box-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Weight (kg)</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($weights as $weight)
                    <tr>
                        <td>{{ $weight['date']  }}</td>
                        <td>{{ $weight['weight'] }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Project Name</th>
                    <th>Collections</th>
                </tr>
                </tfoot>

            </table>

        </div><!-- /.box-body -->
    </div><!-- /.box -->
@stop

@section('footer-script')
    <script type="text/javascript">
        $(function() {
            $('#example1').dataTable({
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "order": [[0, 'desc']]
            });
        });
    </script>
@stop
