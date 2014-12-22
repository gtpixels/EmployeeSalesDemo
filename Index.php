
/**
 * Created by PhpStorm.
 * User: glenndev
 * Date: 22/12/14
 * Time: 11:37
 */





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
    <title>Dashboard Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css" rel="stylesheet">
    <!-- Custom styles for this template -->

    <link href="dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body onload="InitHighChart()">
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sales Report Demo</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                </li>
                <li>
                </li>
                <li>
                </li>
                <li>
                </li>
            </ul>
            <form class="navbar-form navbar-right">
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active">
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Reports</a>
                </li>

            </ul>
            <ul class="nav nav-sidebar">


            </ul>
            <ul class="nav nav-sidebar">

            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 main">
            <h1 class="page-header">Dashboard</h1>
            <div class="row placeholders">
                <button type="button" class="btn btn-default" onclick="HideChart()">Show/Hide Chart</button>


                <div class="col-xs-6 col-sm-3 placeholder">
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                </div>
            </div>
            <div id="chart"></div>

            <h2 class="sub-header">Monthly Sales:</h2>
            <div class="table-responsive">
                <table id="DataTable"class="table table-striped">
                    <thead>
                    <tr>
                        <th>Month</th>
                        <th>Numer of Sales</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    include 'ConnectDB.php';
                    OpenConnection();
                    PopulateEmployeeTable();
                    CloseConnection();
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//code.highcharts.com/highcharts.js"></script>
<script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>



<script>

    $(document).ready(function() {
        $('#DataTable').DataTable();
    } );

    function HideChart()
    {
        $( "#chart" ).toggle();

    }
function InitHighChart()
{
    $("#chart").html("Wait, Loading graph...");

    var options = {
    chart: {
        renderTo: 'chart'

    },
    credits: {
        enabled: false
		},
    title: {
        text: 'Employee Monthly Sales',
			x: -20
		},
    xAxis: {
        categories: [{}]
		},
    tooltip: {
        formatter: function() {
            var s = '<b>'+ this.x +'</b>';

            $.each(this.points, function(i, point) {
                s += '<br/>'+point.series.name+': '+point.y;
            });

            return s;
        },
        shared: true
        },
    series: [{}]
	};

	$.ajax({
		url: "json.php",
		data: 'show=impression',
		type:'post',
		dataType: "json",
		success: function(data){
    options.xAxis.categories = data.Month;
    options.series[0].name = 'Sales';
			options.series[0].data = data.Sales;

			var chart = new Highcharts.Chart(options);
		}
	});

}

</script>