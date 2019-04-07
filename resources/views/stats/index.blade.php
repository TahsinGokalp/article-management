@extends('layout')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="bgc-white bd bdrs-3 ">
                        <div id="year_chart"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bgc-white bd bdrs-3 ">
                        <div id="type_chart"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bgc-white bd bdrs-3 ">
                        <div id="language_chart"></div>
                    </div>
                </div>
            </div>
            <div class="row mT-30">
                <div class="col-md-6">
                    <div class="bgc-white bd bdrs-3 ">
                        <div class="list-group">
                            @foreach($tag as $v)
                                <a href="{!! route('articles').'?tag='.$v->id !!}" class="list-group-item list-group-item-action">
                                    {!! $v->text !!}
                                    <span>({!! $v->article_count !!})</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerAssets')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            drawYearChart();
            drawTypeChart();
            drawLanguageChart();
        }

        function drawYearChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Year');
            data.addColumn('number', 'Total');
            data.addRows([
                    @foreach($year as $k=>$v)
                ['{!! $k !!}', {!! $v !!}],
                @endforeach
            ]);
            var options = {
                'title': 'Yıllara Göre Dağılım',
                'width': 400,
                'height': 300
            };
            var chart = new google.visualization.PieChart(document.getElementById('year_chart'));
            chart.draw(data, options);
        }

        function drawTypeChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Type');
            data.addColumn('number', 'Total');
            data.addRows([
                    @foreach($type as $k=>$v)
                ['{!! getConstantsAndReturnSelected('\App\Models\Article',$k) !!}', {!! $v !!}],
                @endforeach
            ]);
            var options = {
                'title': 'Türlere Göre Dağılım',
                'width': 400,
                'height': 300
            };
            var chart = new google.visualization.PieChart(document.getElementById('type_chart'));
            chart.draw(data, options);
        }

        function drawLanguageChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Dil');
            data.addColumn('number', 'Total');
            data.addRows([
                    @foreach($language as $k=>$v)
                ['{!! $k !!}', {!! $v !!}],
                @endforeach
            ]);
            var options = {
                'title': 'Dillere Göre Dağılım',
                'width': 400,
                'height': 300
            };
            var chart = new google.visualization.PieChart(document.getElementById('language_chart'));
            chart.draw(data, options);
        }
    </script>
@endsection