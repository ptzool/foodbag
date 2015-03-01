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
