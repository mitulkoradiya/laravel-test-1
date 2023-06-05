@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
    <h1>Create Air Duct Cleaning</h1>
    </div>
@stop

@section('content')
    <div class="card col-6">
        <div class="card-body">
            <form action="{{route('air-duct-cleaning.store')}}" method="post">
                @csrf
                <x-adminlte-input label="Job Name" name="job_name" type="text" placeholder="Enter Job Name" value="{{old('job_name')}}" required/>

                <div class="form-group">
                    <label for="exampleInputEmail1">No Of Furnace</label>
                    <select name="furnace" id="furnace" class="form-control" required>
                        @foreach(\App\Models\AirDuctCleaning::FURNACE as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>

                <x-adminlte-input label="Area In Sqft" name="area" id="area" type="number" placeholder="Enter Area In Sqft" value="{{old('area')}}" required/>

                <div class="form-group">
                    <label for="datepicker">Schedule Date</label>
                    <input name="schedule_date" id="datepicker" type="text" autocomplete="off" class="form-control" placeholder="Select Schedule Date" value="{{old('schedule_date')}}" required/>
                </div>

                <div class="form-group">
                    <label for="time_frame">Time Frame</label>
                    <div class=" btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="time_frame_option btn btn-outline-primary mr-2 ml-3" id="time_8to9" >
                            <input type="radio" name="time_frame" autocomplete="off" value="8am_9am" required> 8 AM - 9 AM
                        </label>
                        <label class="time_frame_option btn btn-outline-primary mr-2" id="time_11to1" >
                            <input type="radio" name="time_frame" autocomplete="off" value="11am_1pm" required> 11 AM - 1 PM
                        </label>
                        <label class="time_frame_option btn btn-outline-primary" id="time_1to4" >
                            <input type="radio" name="time_frame" autocomplete="off" value="1pm_4pm" required> 1 PM - 4 PM
                        </label>
                    </div>
                </div>

                <x-adminlte-button label="Create" type="submit" theme="primary"/>
                <a href="{{ route('organizations.index') }}" class="btn btn-secondary ml-3">Cancel</a>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" />
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        let selectedSlots = @json($selectedSlots ?? []);
        let selectedDates = @json($selectedDates ?? []);

        $(function() {
            $("#datepicker").datepicker({ minDate: 0, dateFormat: 'dd-mm-yy'});
        });
        $(document).ready(function() {
            $("#area").keyup(function() {
                let value = $(this).val();
                let time_value = $("input[name='time_frame']:checked").val();

                $(".time_frame_option").removeClass("disabled");
                if(value >= 3301 && value <= 5199) {
                    $("#time_1to4").addClass("disabled");
                    if(time_value == "1pm_4pm") {
                        $('.time_frame_option input').attr('checked', false);
                    }
                }else if(value >= 5200) {
                    $("#time_11to1, #time_1to4").addClass("disabled");
                    if(time_value == "11am_1pm" || time_value == "1pm_4pm") {
                        $('.time_frame_option input').attr('checked', false);
                    }
                }
            });

            $("#furnace").change(function() {
                let value = $(this).val();
                let time_value = $("input[name='time_frame']:checked").val();
                $(".time_frame_option").removeClass("disabled");
                if (value == 2) {
                    $("#time_1to4").addClass("disabled");
                    if(time_value == "1pm_4pm") {
                        $('.time_frame_option input').attr('checked', false);
                    }
                } else if(value == "3+") {
                    $("#time_11to1, #time_1to4").addClass("disabled");
                    if(time_value == "11am_1pm" || time_value == "1pm_4pm") {
                        $('.time_frame_option input').attr('checked', false);
                    }
                }
            });

            $("#datepicker").change(disableTileFrame);
        });

        function disableTileFrame() {
            let date = $('#datepicker').val();
            // $(".time_frame_option").removeClass("disabled");
            if (date) {

            }
        }
    </script>
@stop
