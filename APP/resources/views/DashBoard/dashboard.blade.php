
@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">funds per month</h5>
                            <h2 class="card-title">Column graph</h2>
                        </div>
                        {{-- <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                <input type="radio" name="options" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Accounts</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Purchases</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="2">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Sessions</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area" style='height:500px;'>
                            <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div></div>
                </div>
            </div>
        </div>
    </div>


    <?php
    $jan =0;
    $feb = 0;
    $mar = 0;
    $apr = 0;
    $may = 0;
    $jun = 0;
    $jul = 0;
    $aug = 0;
    $sept = 0;
    $oct = 0;
    $nov = 0;
    $dec = 0;


    $jan1 =0;
    $feb1 = 0;
    $mar1 = 0;
    $apr1 = 0;
    $may1 = 0;
    $jun1 = 0;
    $jul1 = 0;
    $aug1 = 0;
    $sept1 = 0;
    $oct1 = 0;
    $nov1 = 0;
    $dec1 = 0;
    foreach($funds as $fund){
        if($fund->month==1){
        $jan = $jan+$fund->amountPaid;
        }elseif($fund->month==2){
          $feb = $feb +$fund->amountPaid;
        }elseif($fund->month==3){
          $mar = $mar +$fund->amountPaid;
        }elseif($fund->month==4){
          $apr = $apr +$fund->amountPaid;
        }elseif($fund->month==5){
          $may = $may +$fund->amountPaid;
        }elseif($fund->month==6){
          $jun = $jun +$fund->amountPaid;
        }elseif($fund->month==7){
          $jul = $jul +$fund->amountPaid;
        }elseif($fund->month==8){
          $aug = $aug +$fund->amountPaid;
        }elseif($fund->month==9){
           $sept = $sept +$fund->amountPaid;
        }elseif($fund->month==10){
           $oct = $oct +$fund->amountPaid;
        }elseif($fund->month==11){
            $nov = $nov +$fund->amountPaid;
        }elseif($fund->month==12){
            $dec = $dec +$fund->amountPaid;
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
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Funds Per Month"
	},
	axisY: {
		title: "Funds in shillings"
	},
	data: [{
		type: "column",
		showInLegend: true,
		legendMarkerColor: "grey",
		legendText: "Months of the year",
		dataPoints: [
		{ y: <?php echo $jan;?>, label: "JAN" },
                { y: <?php echo $feb;?>, label: "FEB" },
                { y: <?php echo $mar;?>, label: "MAR" },
                { y: <?php echo $apr;?>, label: "APR" },
                { y: <?php echo $may;?>, label: "MAY" },
                { y: <?php echo $jun;?>, label: "JUN" },
                { y: <?php echo $jul;?>, label: "JUL" },
                { y: <?php echo $aug;?>, label: "AUG" },
                { y: <?php echo $sept;?>, label: "SEPT" },
                { y: <?php echo $oct;?>, label: "OCT" },
                { y: <?php echo $nov;?>, label: "NOV" },
                { y: <?php echo $dec;?>, label: "DEC" }
		]
	}]
});
chart.render();

}
</script>


@endpush
