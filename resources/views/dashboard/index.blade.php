@extends('layouts.user.master')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Quick Actions</h3>

            {!! Form::open(array('action' => array('WeightsController@store') )) !!}

            <div class="form-group form-inline">
                {!! Form::label('date', 'Weight:') !!}
                {!! Form::text('date', \Carbon\Carbon::now(), array('id' => 'date', 'class' => 'form-control', 'placeholder' => 'Select date...')) !!}
                {!! Form::text('weight', null, array('class' => 'form-control')) !!}
                {!! Form::submit('Add Weight', ['class' => 'btn btn-large btn-success']) !!}
            </div>

            {!! Form::close() !!}
        </div>
        <div class="box-body">


        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Recent Stats</h3>

        <div class="box-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Weight (kg)</th>
                    <th>BMR</th>
                    <th>In</th>
                    <th>Out</th>
                    <th>Total</th>
                    <th>+/-</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($stats as $stat)
                    <tr>
                        <td>{{ $stat['date']  }}</td>
                        <td>{{ $stat['weight'] }}</td>
                        <td>{{ $stat['bmr_m'] }}</td>
                        <td>{{ $stat['cal_in'] }}</td>
                        <td>{{ $stat['cal_out'] }}</td>
                        <td>{{ ($stat['cal_in'] - $stat['cal_out']) }}</td>
                        <td>{{ ($stat['cal_in'] - $stat['cal_out'] - $stat['bmr_m']) }}</td>
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
    <script>
        $( document ).ready(function() {
            $('#date').datepicker({
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@stop
