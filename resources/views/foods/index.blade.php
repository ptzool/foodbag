@extends('layouts.user.master')

@section('content')

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Food List</h3>

            <div class="box-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Class</th>

                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($foods as $food)
                        <tr>
                            <td>{{ $food['name']  }}</td>
                            <td>{{ $food['name']  }}</td>

                            <td>{!! HTML::linkAction('FoodsController@edit', 'Edit', array($food['id']), array('class' => 'btn btn-xs btn-primary')) !!}</td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>

            </div><!-- /.box-body -->
        </div>
    </div>


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


