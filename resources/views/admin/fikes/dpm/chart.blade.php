@extends('admin.maintemplate')
@section('content')
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-body">
                <div style="margin-bottom: 35px;">
                    <div id="container" style="width: 100%; height: 100%; margin: 0 auto"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('chart')
    <script type="text/javascript">
        $(document).ready(function() {
            Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Hasil DPM'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Hasil',
                    colorByPoint: true,
                    data: {!! json_encode($tampung) !!}
                }]
            });
        })
    </script>
@endsection
