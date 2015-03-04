@extends('layouts.user.master')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Add Eats</h3>

        <div class="box-body">
            {!! Form::open(array('action' => array('EatsController@store'), 'class' => 'form-inline' )) !!}

            {!! Form::text('eaten', \Carbon\Carbon::now(), array('size' => 3, 'class' => 'date form-control')) !!}
            Amt: {!! Form::text('amount', null, array('size' => 3, 'class' => 'form-control')) !!}
            {!! Form::select('amount_type', array('S'=>'g', 'P'=>'#', 'L'=>'ml'), null, array('size' => 1, 'class' => 'form-control')) !!}
            {!! Form::text('food', null, array('size' => 50, 'id' => 'food', 'class' => 'typeahead form-control')) !!}
            {!! Form::hidden('food_id', null, array('id' => 'food_id')) !!}
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
                    <th>Food Class</th>
                    <th>Food</th>
                    <th>Amount</th>
                    <th class="right">Cals</th>
                    <th>Fat</th>
                    <th>Protein</th>
                    <th>Carbs</th>
                    <th>Calcium</th>
                    <th>Salt</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($user->eatsWeek as $eat)
                    <tr>
                        <td>{{ $eat['eaten']  }}</td>
                        <td></td>
                        <td>{{ $eat->food['name']  }}</td>
                        <td>{{ $eat['amount']  }} {{ $eat->getUnit()  }}</td>
                        <td>{{ $eat->getCalories()  }}</td>
                        <td>{{ $eat->food['fat']  }}</td>
                        <td>{{ $eat->food['protein']  }}</td>
                        <td>{{ $eat->food['carbs']  }}</td>
                        <td>{{ $eat->food['calcium']  }}</td>
                        <td>{{ $eat->food['salt']  }}</td>
                        <td>

                            {!! Form::open(array('method'=>'delete', 'action' => array('EatsController@destroy', $eat['id']),  'class' => 'form-inline' )) !!}

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
