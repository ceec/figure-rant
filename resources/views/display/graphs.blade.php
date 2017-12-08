@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>Graphs</h1>
            <h2>Yen/USD</h2>
            <style>
            #chartdiv {
  width: 100%;
  height: 500px;
}
            </style>
            <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js" type="text/javascript"></script>

<div id="chartdiv"></div>                                           
<script>



var chart = AmCharts.makeChart( "chartdiv", {
  "theme": "light",
  "type": "serial",
  "dataLoader": {
    "url": "/data/yenusd",
    "format": "json"
  },
  "valueAxes": [ {
    "inside": true,
    "axisAlpha": 0
  },{
    "id": "usd",
    "position": "right"
  } ],
  "graphs": [ {
    "balloonText": "<div style='margin:5px; font-size:19px;'><span style='font-size:13px;'>[[category]]</span><br>[[value]]</div>",
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletBorderColor": "#FFFFFF",
    "hideBulletsCount": 50,
    "lineThickness": 2,
    "negativeLineColor": "#67b7dc",
    "valueField": "rate",
    "valueAxis": "usd"
  }],
  "chartScrollbar": {

  },
  "chartCursor": {},
  "categoryField": "payment_date",
  "categoryAxis": {
    "parseDates": true,
    "axisAlpha": 0,
    "minHorizontalGap": 55
  }
} );

</script>
    
        <h2>Total orders over time</h2>
<div id="chartdiv2"></div>                                           
<script>



var chart = AmCharts.makeChart( "chartdiv2", {
  "theme": "light",
  "type": "serial",
  "dataLoader": {
    "url": "/data/totalorders",
    "format": "json"
  },
  "valueAxes": [ {
    "inside": true,
    "axisAlpha": 0
  },{
    "id": "usd",
    "position": "right"
  } ],
  "graphs": [ {
    "balloonText": "<div style='margin:5px; font-size:19px;'><span style='font-size:13px;'>[[category]]</span><br>[[value]]</div>",
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletBorderColor": "#FFFFFF",
    "hideBulletsCount": 50,
    "lineThickness": 2,
    "negativeLineColor": "#67b7dc",
    "valueField": "total_usd",
    "valueAxis": "usd"
  } ,
  {
    "balloonText": "<div style='margin:5px; font-size:19px;'><span style='font-size:13px;'>[[category]]</span><br>[[value]]</div>",
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletBorderColor": "#FFFFFF",
    "hideBulletsCount": 50,
    "lineThickness": 2,
    "lineColor": "#fdd400",
    "negativeLineColor": "#67b7dc",
    "valueField": "total_yen"
  } ],
  "chartScrollbar": {

  },
  "chartCursor": {},
  "categoryField": "payment_date",
  "categoryAxis": {
    "parseDates": true,
    "axisAlpha": 0,
    "minHorizontalGap": 55
  }
} );

</script>
        </div>

    </div>
</div>
@endsection