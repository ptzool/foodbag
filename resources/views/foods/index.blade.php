@extends('layouts.user.master')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Food</h3>

            <div class="box-body">

                @if ($errors->has())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                {!! Form::open(array('action' => array('FoodsController@store'), 'class' => 'form-inline' )) !!}

                Class: {!! Form::text('food_class_id', \Carbon\Carbon::now(), array('size' => 16, 'class' => 'date form-control')) !!}
                Name: {!! Form::text('name', null, array('size' => 10, 'class' => 'form-control')) !!}<br />
                Size: {!! Form::text('size', null, array('size' => 3, 'class' => 'form-control')) !!}<br />
                Serving Size: {!! Form::text('serving_size', null, array('size' => 3, 'class' => 'form-control')) !!}<br />
                Calories: {!! Form::text('calories', null, array('size' => 3, 'class' => 'form-control')) !!}<br />
                Protein: {!! Form::text('protein', null, array('size' => 3, 'class' => 'form-control')) !!}<br />
                Carbs: {!! Form::text('carbs', null, array('size' => 3, 'class' => 'form-control')) !!}<br />
                Sugar: {!! Form::text('carbs_sugar', null, array('size' => 3, 'class' => 'form-control')) !!}<br />
                Fat: {!! Form::text('fat', null, array('size' => 3, 'class' => 'form-control')) !!}<br />
                Saturated: {!! Form::text('fat_sat', null, array('size' => 3, 'class' => 'form-control')) !!}<br />
                Fibre: {!! Form::text('fibre', null, array('size' => 3, 'class' => 'form-control')) !!}<br />
                Sodium: {!! Form::text('sodium', null, array('size' => 3, 'class' => 'form-control')) !!}<br />
                Salt: {!! Form::text('sodium_assalt', null, array('size' => 3, 'class' => 'form-control')) !!}<br />
                Calcium: {!! Form::text('calcium', null, array('size' => 3, 'class' => 'form-control')) !!}<br />
                Cholesterol: {!! Form::text('cholesterol', null, array('size' => 3, 'class' => 'form-control')) !!}<br />

                Notes: {!! Form::text('notes', null, array('size' => 10, 'class' => 'form-control')) !!}
                {!! Form::submit('Add', ['class' => 'btn btn-large btn-success']) !!}

                {!! Form::close() !!}

            </div><!-- /.box-body -->
        </div>
    </div>

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

                            <td><a href="" class="btn btn-xs btn-success">Edit</a></td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>






            </div><!-- /.box-body -->
        </div>
    </div>


@stop

