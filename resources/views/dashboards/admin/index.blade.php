@extends('layouts.adminLayouts.index')

@section('center')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div id="admin-starter-users">
                <div class="mt-4 mb-4 ml-4 mr-3">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <h1>
                                <i class="fas fa-chart-pie pr-2"></i>
                                Overview
                            </h1>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-6 mt-4">
                            <div id="user_highchart" class="pt-3 align-items-center justify-content-center"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-6 mt-4">
                            <div id="user_piechart" style="width:750px; height:450px;" class="pt-3 align-items-center justify-content-center"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
    var userDataHighChart = <?php echo json_encode($userDataHighChart)?>;

    Highcharts.chart('user_highchart', {
        title: {
            text: 'New User Growth'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Number of New Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Users',
            data: userDataHighChart
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

    // PieChart Script
    var analytics = <?php echo $role; ?>

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart()
    {
        var data = google.visualization.arrayToDataTable(analytics);
        var options = {
            title : 'Percentage of Users',
        };

        var userTypes = {
            1: 'Admin',
            2: 'Enterprise',
            3: 'Freelancer',
            4: 'Starter',
            5: 'Employee'
        };

        var view = new google.visualization.DataView(data);
        view.setColumns([{
            calc: function (dt, row) {
                return userTypes[data.getValue(row, 0)];
            },
            label: 'users',
            type: 'string'
        }, 1]);

        var chart = new google.visualization.PieChart(document.getElementById('user_piechart'));
        chart.draw(data, options);
    }
</script>

@endsection