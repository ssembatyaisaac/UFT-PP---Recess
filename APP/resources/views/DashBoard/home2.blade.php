
@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Percentage Change in Enrollment</h5>
                            <h2 class="card-title">Bar Graph</h2>
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

    foreach($enrollment as $enrollment){
        if($enrollment->month==1){
        $jan = $jan+1;
        }elseif($enrollment->month==2){
          $feb = $feb +1;
        }elseif($enrollment->month==3){
          $mar = $mar +1;
        }elseif($enrollment->month==4){
          $apr = $apr +1;
        }elseif($enrollment->month==5){
          $may = $may +1;
        }elseif($enrollment->month==6){
          $jun = $jun +1;
        }elseif($enrollment->month==7){
          $jul = $jul +1;
        }elseif($enrollment->month==8){
          $aug = $aug +1;
        }elseif($enrollment->month==9){
           $sept = $sept +1;
        }elseif($enrollment->month==10){
           $oct = $oct +1;
        }elseif($enrollment->month==11){
            $nov = $nov +1;
        }elseif($enrollment->month==12){
            $dec = $dec +1;
        }

    }


if($dec>0){
    $jan1 =(($jan-$dec)/$dec)*100;
}
if($jan>0){
    $feb1 =(($feb-$jan)/$jan)*100;
}
if($feb>0){
    $mar1 =(($mar-$feb)/$feb)*100;
}
if($mar>0){
    $apr1 =(($apr-$mar)/$mar)*100;
}
if($apr>0){
    $may1 =(($may-$apr)/$apr)*100;
}
if($may>0){
    $jun1 =(($jun-$may)/$may)*100;
}
if($jun>0){
    $jul1 =(($jul-$jun)/$jun)*100;
}
if($jul>0){
    $aug1 =(($aug-$jul)/$jul)*100;
}
if($aug>0){
    $sept1 =(($sept-$aug)/$aug)*100;
}
if($sept>0){
    $oct1 =(($oct-$sept)/$sept)*100;
}
if($oct>0){
    $nov1 =(($nov-$oct)/$oct)*100;
}
if($nov>0){
    $dec1 =(($dec-$nov)/$nov)*100;
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
                    text:"Percentage Change in Enrollment"
                },
                axisX:{
                    interval: 1
                },
                axisY2:{
                    interlacedColor: "rgba(1,77,101,.2)",
                    gridColor: "rgba(1,77,101,.1)",
                    title: "Percentage"
                },
                data: [{
                    type: "bar",
                    name: "companies",
                    axisYType: "secondary",
                    color: "#014D65",
                    dataPoints: [
                { y: <?php echo $jan1;?>, label: "JAN" },
                { y: <?php echo $feb1;?>, label: "FEB" },
                { y: <?php echo $mar1;?>, label: "MAR" },
                { y: <?php echo $apr1;?>, label: "APR" },
                { y: <?php echo $may1;?>, label: "MAY" },
                { y: <?php echo $jun1;?>, label: "JUN" },
                { y: <?php echo $jul1;?>, label: "JUL" },
                { y: <?php echo $aug1;?>, label: "AUG" },
                { y: <?php echo $sept1;?>, label: "SEPT" },
                { y: <?php echo $oct1;?>, label: "OCT" },
                { y: <?php echo $nov1;?>, label: "NOV" },
                { y: <?php echo $dec1;?>, label: "DEC" }
                    ]
                }]
            });
            chart.render();

            }
            </script>


@endpush
