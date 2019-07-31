
@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Wellwishers Per Month</h5>
                            <h2 class="card-title">Line Graph</h2>
                        </div>

                    </div>
                </div>
            <form method="POST" action="{{route('donor.store')}}">
                @csrf
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('Select Month') }}</label>
                    @include('alerts.feedback', ['field' => 'dateOfPayment'])
                    <select id="input-dateOfPayment" name="month" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Date Of Payment') }}" value="{{ old('dateOfPayment') }}" required autofocus>>
                        <option selected>Choose Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>


                    </select>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Submit') }}</button>
                </div>
            </form>
                <div class="card-body">
                    <div class="chart-area" style='height:500px;'>
                            <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div></div>
                </div>
            </div>
        </div>
    </div>



    <?php
    if(isset($donors)){
    $n = 0;
    $names = array();
    $amount = array();
    $name = array();

  foreach($donors as $donor){
   $names[$n] = $donor->fName;
   $name[$n] = $donor->lName;
   $amount[$n] = $donor->amountPaid;

   $n++;
  }
}
   ?>

@endsection

@push('js')
<script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script src="{{ asset('black') }}/canvasjs.min.js"></script>

    <script>
        window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            animationEnabled: true,
            title:{
                text: "Donations and Well wishers"
            },
            axisX: {
                interval: 1,
                intervalType: "month",
                valueFormatString: "MMM"
            },
            axisY:{
                title: "Amount in shillings",
                valueFormatString: "Shs#0"
            },
            data: [{
                type: "line",
                markerSize: 12,
                xValueFormatString: "MMM, YYYY",
                yValueFormatString: "Shs###.#",
                dataPoints: [

                    <?php
                    if(isset($donors)){
                    for($k=0; $k<sizeof($names); $k++){
                    echo "{ y:". $amount[$k]. ", label:"."'".$names[$k]."  ".$name[$k]."'"."},";
                       }
                    }
                    ?>


                ]
            }]
        });
        chart.render();

        }
        </script>

@endpush
