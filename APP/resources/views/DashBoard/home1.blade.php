
@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">funds per period</h5>
                            <h2 class="card-title">Line Graph</h2>
                        </div>
                        <div class="col-sm-6">
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
                        </div>
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
    

    $first =0;
    $second = 0;
    $third = 0;
    $fourth = 0;

    foreach($funds as $fund){
        if($fund->month==1 || $fund->month==2 || $fund->month==3){
        $first = $first+$fund->amountPaid;
        }elseif($fund->month==4 || $fund->month==5 || $fund->month==6){
          $second = $second +$fund->amountPaid;
        }elseif($fund->month==7 || $fund->month==8 || $fund->month==9){
          $third = $third +$fund->amountPaid;
        }elseif($fund->month==10 || $fund->month==11 || $fund->month==12 ){
          $fourth = $fourth +$fund->amountPaid;
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
	title:{
		text: "Funds Per Period"
	},
	axisY: {
		title: "Funds in Shillings",

		stripLines: [{
			value: 3366500,
			label: "Average"
		}]
	},
	data: [{
		yValueFormatString: "#,### Shs",
		xValueFormatString: "YYYY",
		type: "spline",
		dataPoints: [
                { y: <?php echo $first;?>, label: "First Quarter" },
                { y: <?php echo $second;?>, label: "Second Quarter" },
                { y: <?php echo $third;?>, label: "Third Quarter" },
                { y: <?php echo $fourth;?>, label: "Fourth Quarter" }

		]
	}]
});
chart.render();

}
</script>


@endpush
