@extends('layouts.user.master')

@section('content')
    <style>
        .tt-query {
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
            color: #999
        }

        .tt-dropdown-menu {
            width: 422px;
            margin-top: 4px;
            padding: 4px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
            -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
            box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
            padding: 3px 20px;
            line-height: 24px;
        }

        .tt-suggestion.tt-cursor {
            color: #fff;
            background-color: #0097cf;

        }

        .tt-suggestion p {
            margin: 0;
        }
    </style>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Quick Actions</h3>

            {!! Form::open(array('action' => array('WeightsController@store') )) !!}

            <div class="form-group form-inline">
                {!! Form::label('date', 'Weight:') !!}
                {!! Form::text('date', \Carbon\Carbon::now(), array('id' => 'date', 'class' => 'date form-control', 'placeholder' => 'Select date...')) !!}
                {!! Form::text('weight', null, array('size' => 3, 'class' => 'form-control')) !!}
                {!! Form::submit('Add', ['class' => 'btn btn-large btn-success']) !!}
            </div>

            {!! Form::close() !!}

            <p><strong>Add Exercise</strong></p>

            {!! Form::open(array('action' => array('ActivitiesController@store'), 'class' => 'form-inline' )) !!}

            Date: {!! Form::text('activity_date', \Carbon\Carbon::now(), array('size' => 3, 'class' => 'date form-control')) !!}
            Duration: {!! Form::text('duration', null, array('size' => 3, 'class' => 'form-control')) !!}
            Distance: {!! Form::text('distance', null, array('size' => 3, 'class' => 'form-control')) !!}
            <button id="timeconvert">R</button>
            {!! Form::select('activity_type_id', array($activity_types), null, array('size' => 1, 'class' => 'form-control')) !!}

            Notes: {!! Form::text('notes', null, array('size' => 10, 'id' => 'food', 'class' => 'form-control')) !!}
            {!! Form::submit('Add', ['class' => 'btn btn-large btn-success']) !!}

            {!! Form::close() !!}

            <p><strong>Quick Exercise</strong></p>
            Madingley:

                {!! Form::open(array('action' => array('RepeatActivityController@applyToLoggedInUser', 2), 'style' => 'display: inline !important;', 'class' => 'form-inline' )) !!}
                {!! Form::submit('Morning Bike', ['class' => 'btn btn-sm']) !!}
                {!! Form::close() !!}

                {!! Form::open(array('action' => array('RepeatActivityController@applyToLoggedInUser', 3),  'style' => 'display: inline !important;', 'class' => 'form-inline' )) !!}
                {!! Form::submit('Evening Bike', ['class' => 'btn btn-sm']) !!}
                {!! Form::close() !!}

                {!! Form::open(array('action' => array('RepeatActivityController@applyToLoggedInUser', 3), 'style' => 'display: inline !important;', 'class' => 'form-inline' )) !!}
                {!! Form::submit('Morning Walk', ['class' => 'btn btn-sm']) !!}
                {!! Form::close() !!}

                {!! Form::open(array('action' => array('RepeatActivityController@applyToLoggedInUser', 3), 'style' => 'display: inline !important;', 'class' => 'form-inline' )) !!}
                {!! Form::submit('Evening Walk', ['class' => 'btn btn-sm']) !!}
                {!! Form::close() !!}
            <br />
            River:

                {!! Form::open(array('action' => array('RepeatActivityController@applyToLoggedInUser', 2), 'style' => 'display: inline !important;',  'class' => 'form-inline' )) !!}
                {!! Form::submit('Morning Bike', ['class' => 'btn btn-sm']) !!}
                {!! Form::close() !!}

                {!! Form::open(array('action' => array('RepeatActivityController@applyToLoggedInUser', 3), 'style' => 'display: inline !important;', 'class' => 'form-inline' )) !!}
                {!! Form::submit('Evening Bike', ['class' => 'btn btn-sm']) !!}
                {!! Form::close() !!}

                {!! Form::open(array('action' => array('RepeatActivityController@applyToLoggedInUser', 3), 'style' => 'display: inline !important;', 'class' => 'form-inline' )) !!}
                {!! Form::submit('Morning Walk', ['class' => 'btn btn-sm']) !!}
                {!! Form::close() !!}

                {!! Form::open(array('action' => array('RepeatActivityController@applyToLoggedInUser', 3), 'style' => 'display: inline !important;', 'class' => 'form-inline' )) !!}
                {!! Form::submit('Evening Walk', ['class' => 'btn btn-sm']) !!}
                {!! Form::close() !!}
            <br />
            Observatory:

                {!! Form::open(array('action' => array('RepeatActivityController@applyToLoggedInUser', 2), 'style' => 'display: inline !important;', 'class' => 'form-inline' )) !!}
                {!! Form::submit('Evening Bike', ['class' => 'btn btn-sm']) !!}
                {!! Form::close() !!}

                {!! Form::open(array('action' => array('RepeatActivityController@applyToLoggedInUser', 3), 'style' => 'display: inline !important;', 'class' => 'form-inline' )) !!}
                {!! Form::submit('Evening Walk', ['class' => 'btn btn-sm']) !!}
                {!! Form::close() !!}

            Wests:
                {!! Form::open(array('action' => array('RepeatActivityController@applyToLoggedInUser', 3), 'style' => 'display: inline !important;',    'class' => 'form-inline' )) !!}
                {!! Form::submit('Wests Walk', ['class' => 'btn btn-sm']) !!}
                {!! Form::close() !!}


            <p><strong>Add Eats</strong></p>

            {!! Form::open(array('action' => array('EatsController@store'), 'class' => 'form-inline' )) !!}

            {!! Form::text('eaten', \Carbon\Carbon::now(), array('size' => 3, 'class' => 'date form-control')) !!}
            Amt: {!! Form::text('amount', null, array('size' => 3, 'class' => 'form-control')) !!}
            {!! Form::select('amount_type', array('S'=>'g', 'P'=>'#', 'L'=>'ml'), null, array('size' => 1, 'class' => 'form-control')) !!}
            {!! Form::text('food', null, array('size' => 50, 'id' => 'food', 'class' => 'typeahead form-control')) !!}
            {!! Form::hidden('food_id', null, array('id' => 'food_id')) !!}
            {!! Form::submit('Add', ['class' => 'btn btn-large btn-success']) !!}

            {!! Form::close() !!}


        </div>
        <div class="box-body">


        </div><!-- /.box-body -->
    </div><!-- /.box -->


    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Recent Weight</h3>

            <div class="box-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Weight (kg)</th>
                        <th>BMI</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($weights as $weight)
                        <tr>
                            <td>{{ $weight['date']  }}</td>
                            <td>{{ $weight['weight'] }}</td>
                            <td>{{ \Foodbag\Body\Calculator::bmi($weight['weight'], $user['height']) }}</td>
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

    </div>

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
        </div>


    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Recent Stats</h3>

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
                    @foreach ($eats as $eat)
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
                            <td></td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>



            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>


    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Recent Exercise</h3>

            <div class="box-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Duration</th>
                        <th>Calories</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity['activity_date']  }}</td>
                            <td>{{ $activity->type['name']  }}</td>
                            <td>{{ $activity['duration']  }}</td>
                            <td>{{ $activity->getMetRateValue(95)  }}</td>

                            <td></td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>



            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
@stop


@section('footer-script')
    <script>
        $( document ).ready(function() {

            $('.date').datepicker({
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                autoclose: true,
                todayHighlight: true
            });

            var foods = new Bloodhound({
                datumTokenizer: function (datum) {
                    return Bloodhound.tokenizers.whitespace(datum.name);
                },
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: 'http://foodbag.app/foods/?q=%QUERY',
                    filter: function (foods) {
                        // Map the remote source JSON array to a JavaScript object array
                        return $.map(foods, function (food) {
                            return {
                                name: food.name,
                                value: food.id
                            };
                        });
                    }
                }
            });

            foods.initialize();

            $('#food').typeahead(null, {
                displayKey: function(food) {
                    return food.name;
                },
                source: foods.ttAdapter()
            }).on('typeahead:selected', function(event, data){
                $('#food_id').val(data.value);
            });

        });


    </script>
@stop
