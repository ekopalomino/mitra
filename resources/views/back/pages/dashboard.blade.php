@extends('back.layouts.main')
@section('header.title')
Agrinesia Sales Dashboard  | Dashboard
@endsection
@section('header.plugins')
<link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('header.styles')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawSalesChart);
    google.charts.setOnLoadCallback(drawProductChart);
    google.charts.setOnLoadCallback(drawBrandChart);
    function drawSalesChart() {
        var sales = <?php echo $data; ?>;
        var data = google.visualization.arrayToDataTable(sales);
        var options = {
          title: 'Monthly Sales Figure',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('linechart_material'));
        chart.draw(data, options);
    }
    function drawProductChart() {
        var variants = <?php echo $variants; ?>;
        var data = google.visualization.arrayToDataTable(variants);
        var options = {
          title: 'Top 10 Product Variants',
        };

        var chart = new google.visualization.BarChart(document.getElementById('Product_chart_div'));
        chart.draw(data, options);
    }
    function drawBrandChart() {
        var contributions = <?php echo $contributions; ?>;
        var data = google.visualization.arrayToDataTable(contributions);
        var options = {
          title: 'Brand Contributions',
        };

        var chart = new google.visualization.PieChart(document.getElementById('Brand_chart_div'));
        chart.draw(data, options);
    }
</script>
@endsection
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ number_format($sales,0,',','.')}}">{{ number_format($sales,0,',','.')}}</span>
                    </div>
                    <div class="desc"> Sales </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ number_format($target,0,',','.')}}">{{ number_format($target,0,',','.')}}</span>
                    </div>
                    <div class="desc"> Target </div>
                </div>
            </a>
        </div> 
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ number_format($achievements,2,',','.')}} %">{{ number_format($achievements,2,',','.')}} %</span>
                    </div>
                    <div class="desc"> Achievement </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ number_format($growth,2,',','.')}} %">{{ number_format($growth,2,',','.')}} %</span>
                    </div>
                    <div class="desc"> Growth </div>
                </div>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div id="linechart_material" style="min-height: 450px"></div>  
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-6 col-xs-12 col-sm-12">
            <div id="Product_chart_div" style="width: 100%; min-height: 650px"></div>
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-12">
            <div id="Brand_chart_div" style="width: 100%; min-height: 650px"></div>
        </div>
    </div>
</div>
@endsection
@section('footer.plugins')
<script src="{{ asset('assets/global/plugins/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
@endsection
@section('footer.scripts')
<script src="{{ asset('assets/pages/scripts/dashboard.min.js') }}" type="text/javascript"></script>
@endsection