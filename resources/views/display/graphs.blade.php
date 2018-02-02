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


            #chartdiv2 {
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
    
        <h2>Shipping vs Total Order</h2>
<div id="chartdiv2"></div>                                           
<script>



var chart = AmCharts.makeChart( "chartdiv2", {
  "theme": "light",
  "type": "serial",
  "dataLoader": {
    "url": "/data/totalorders",
    "format": "json",
    "postProcess": function(data) {
      for (var i = data.length - 1; i >= 0; i--) {
        data[i].items_yen = data[i].total_yen - data[i].shipping_yen;
      };
      console.log(data);
      return data;
    }
  },
  "legend": {},
    "valueAxes": [{
         //"stackType": "100%",
          "stackType": "regular",
        "axisAlpha": 0.3,
        "gridAlpha": 0
    }],
  "graphs": [   {
    "balloonText": "<div style='margin:5px; font-size:19px;'><span style='font-size:13px;'>[[title]]</span><br>[[shipping_yen]]</div>",
    "type": "column",
     "fillAlphas": 1,
     "title": "Shipping",
    "valueField": "shipping"
  } ,{
    "balloonText": "<div style='margin:5px; font-size:19px;'><span style='font-size:13px;'>[[title]]</span><br>[[items_yen]]</div>",
    "type": "column",
     "fillAlphas": 1,
     "title": "Items",
    "valueField": "items",
  } 
],
  "chartCursor": {},
  "categoryField": "order_date",
  "categoryAxis": {
    "labelRotation": 45
    //"parseDates": true,
    //"equalSpacing": true
  }
} );

</script>
        </div>

    </div>
</div>
@endsection