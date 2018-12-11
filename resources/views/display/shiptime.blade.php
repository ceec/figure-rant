@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>Graph - Shipping Time</h1>
            <style>
            #chartdiv {
  width: 100%;
  height: 500px;
}


            </style>
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<div id="chartdiv"></div>                                           
<script>


var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.paddingRight = 30;
chart.dateFormatter.inputDateFormat = "yyyy-MM-dd HH:mm";

var colorSet = new am4core.ColorSet();
colorSet.saturation = 0.4;

chart.dataSource.url = "/data/shiptime";
// chart.data = [ {
//   "category": "Module #1",
//   "start": "2016-01-01",
//   "end": "2016-09-14",
//   "color": colorSet.getIndex(0).brighten(0),
//   "task": "Gathering requirements"
// }, {
//   "category": "Module #1",
//   "start": "2016-09-14",
//   "end": "2016-10-01",
//   "color": colorSet.getIndex(0).brighten(0.4),
//   "task": "Producing specifications"
// }, {
//   "category": "Module #1",
//   "start": "2016-02-05",
//   "end": "2016-04-18",
//   "color": colorSet.getIndex(0).brighten(0.8),
//   "task": "Development"
// }, {
//   "category": "Module #1",
//   "start": "2016-04-18",
//   "end": "2016-04-30",
//   "color": colorSet.getIndex(0).brighten(1.2),
//   "task": "Testing and QA"
// }];

chart.dateFormatter.dateFormat = "yyyy-MM-dd";
chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.inversed = true;

var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.minGridDistance = 70;
dateAxis.baseInterval = { count: 1, timeUnit: "day" };
// dateAxis.max = new Date(2018, 0, 1, 24, 0, 0, 0).getTime();
//dateAxis.strictMinMax = true;
dateAxis.renderer.tooltipLocation = 0;

var series1 = chart.series.push(new am4charts.ColumnSeries());
series1.columns.template.width = am4core.percent(80);
series1.columns.template.tooltipText = "{status}: [bold]{openDateX}[/] - [bold]{dateX}[/]";

series1.dataFields.openDateX = "start";
series1.dataFields.dateX = "end";
series1.dataFields.categoryY = "category";
series1.columns.template.propertyFields.fill = "color"; // get color from data
series1.columns.template.propertyFields.stroke = "color";
series1.columns.template.strokeOpacity = 1;

</script>
        </div>

    </div>
</div>
@endsection