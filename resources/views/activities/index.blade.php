@extends('layouts.user.master')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Activity</h3>

            <div class="box-body">
                {!! Form::open(array('action' => array('ActivitiesController@store'), 'class' => 'form-inline' )) !!}

                Date: {!! Form::text('activity_date', \Carbon\Carbon::now(), array('size' => 16, 'class' => 'date form-control')) !!}
                Duration: {!! Form::text('duration', null, array('size' => 3, 'class' => 'form-control')) !!}
                Distance: {!! Form::text('distance', null, array('size' => 3, 'class' => 'form-control')) !!}
                <button id="timeconvert">R</button>
                {!! Form::select('activity_type_id', array($activity_types), null, array('size' => 1, 'class' => 'form-control')) !!}

                Notes: {!! Form::text('notes', null, array('size' => 10, 'class' => 'form-control')) !!}
                {!! Form::submit('Add', ['class' => 'btn btn-large btn-success']) !!}

                {!! Form::close() !!}

            </div><!-- /.box-body -->
        </div>
    </div>

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Eats History</h3>

            <div class="box-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Activity</th>
                        <th>Duration</th>
                        <th>Distance</th>
                        <th class="right">Cals</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($activities->get() as $activity)
                        <tr>
                            <td>{{ $activity['activity_date']  }}</td>
                            <td>{{ $activity->type['name']  }}</td>
                            <td>{{ $activity->food['duration']  }}</td>
                            <td>{{ $activity->food['distance']  }}</td>
                            <td></td>
                            <td>

                                {!! Form::open(array('method'=>'delete', 'action' => array('ActivitiesController@destroy', $activity['id']),  'class' => 'form-inline' )) !!}

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
        </div>
    </div>


@stop

@section('footer-script')

    @include('scripts.dates')
    @include('scripts.foods-typeahead')

    <script>
        $( document ).ready(function() {
            $( "button.delete" ).click(function(e) {
                e.preventDefault();
                // var id = $(this).data('id');
            });
        });


    </script>

    @include('scripts.delete-confirm')

@stop
