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

                {!! Form::model($food, array('method' => 'PUT', 'action' => array('FoodsController@update', $food->id) )) !!}

                        <!-- name -->
                    <div class="form-group">
                    {!! Form::label('name', 'Name')  !!}
                    {!! Form::text('name')  !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('size', 'Size')  !!}
                    {!! Form::text('size')  !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('serving_size', 'serving_size')  !!}
                    {!! Form::text('serving_size')  !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('calories', 'calories')  !!}
                    {!! Form::text('calories')  !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('protein', 'protein')  !!}
                    {!! Form::text('protein')  !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('carbs', 'carbs')  !!}
                    {!! Form::text('carbs')  !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('carbs_sugar', 'carbs_sugar')  !!}
                    {!! Form::text('carbs_sugar')  !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('fat', 'fat')  !!}
                    {!! Form::text('fat')  !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('fat_sat', 'fat_sat')  !!}
                    {!! Form::text('fat_sat')  !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('fibre', 'fibre')  !!}
                    {!! Form::text('fibre')  !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('sodium', 'sodium')  !!}
                    {!! Form::text('sodium')  !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('sodium_assalt', 'sodium_assalt')  !!}
                    {!! Form::text('sodium_assalt')  !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('calcium', 'calcium')  !!}
                    {!! Form::text('calcium')  !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('cholesterol', 'cholesterol')  !!}
                    {!! Form::text('cholesterol')  !!}
                    </div>

                    {!! Form::submit('Update') !!}

                    {!!  Form::close()  !!}


            </div><!-- /.box-body -->
        </div>
    </div>



@stop

