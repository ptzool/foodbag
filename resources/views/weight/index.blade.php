@extends('layouts.user.master')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Weight History</h3>

        </div>
        <div class="box-body">

            <p>
                <a class="btn btn-info" href="?limit=10">10</a>
                <a class="btn btn-info" href="?limit=50">50</a>
                <a class="btn btn-info" href="?limit=100">100</a>
                <a class="btn btn-info" href="?limit=1000">1000</a>
                <a class="btn btn-info" href="?limit=10000">10000</a>
            </p>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Weight (kg)</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($weights as $weight)
                    <tr>
                        <td>{{ $weight['date']  }}</td>
                        <td>{{ $weight['weight'] }}</td>
                        <td>

                            {!! Form::open(array('method'=>'delete', 'action' => array('WeightsController@destroy', $weight['id']),  'class' => 'form-inline' )) !!}

                            <button class='btn btn-xs btn-danger delete' type='submit' data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message='Are you sure you want to delete this user ?'>
                                <i class='glyphicon glyphicon-trash'></i> Delete
                            </button>

                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
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

        $( document ).ready(function() {
            $( "button.delete" ).click(function(e) {
                e.preventDefault();
                // var id = $(this).data('id');
            });
        });


    </script>

    @include('scripts.delete-confirm')

@stop
