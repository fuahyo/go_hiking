
@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
        <h1 class="h2 justify-content-center">Report</h1>
        <!-- <a href="/dashboard/chart" class="btn btn-primary mb-3">Create new post</a> -->
    </div>

    <div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading" id="chart2">
							
						</div>
						<div class="panel-body">
							<div class="row">
								
							</div>
							
						</div>
					</div>
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-6">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Report CAPA by Status</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										
										<!-- <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button> -->
									</div>
								</div>
								<div class="panel-body no-padding">
									
									<div class="panel-heading" id="chart1">
								</div>
								<div class="panel-footer">
									<div class="row">
										<!-- <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div> -->
										<!-- <div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Purchases</a></div> -->
									</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
						</div>
						<div class="col-md-6 ">
						<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Report CAPA by Status</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										
										<!-- <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button> -->
									</div>
								</div>
								<div class="panel-body no-padding">
									
									<div class="panel-heading" id="chart1">
								</div>
								<div class="panel-footer">
									<div class="row">
										<!-- <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div> -->
										<!-- <div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Purchases</a></div> -->
									</div>
								</div>
							</div>
							<!-- <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">My Tasks</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
											</div>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled task-list">
										<li>
											<p>Updating Users Settings <span class="label-percent">23%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width:23%">
													<span class="sr-only">23% Complete</span>
												</div>
											</div>
										</li>
										<li>
											<p>Load &amp; Stress Test <span class="label-percent">80%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
													<span class="sr-only">80% Complete</span>
												</div>
											</div>
										</li>
										<li>
											<p>Data Duplication Check <span class="label-percent">100%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
													<span class="sr-only">Success</span>
												</div>
											</div>
										</li>
										<li>
											<p>Server Check <span class="label-percent">45%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
													<span class="sr-only">45% Complete</span>
												</div>
											</div>
										</li>
										<li>
											<p>Mobile App Development <span class="label-percent">10%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
													<span class="sr-only">10% Complete</span>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div> -->
						</div>
					</div>
					
					
						
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

@endsection

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
	// Data retrieved from: https://www.uefa.com/uefachampionsleague/history/
Highcharts.chart('chart1', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Report CAPA by Root Cause'
    },
    xAxis: {
        categories: {!!json_encode($alldept)!!},
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Amount of CAPA'
        }
    },
    legend: {
        reversed: true
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [  {
        name: 'Man',
        data: {!!json_encode($man)!!}
    }, {
        name: 'Machine',
        data: {!!json_encode($machine)!!}
    }, {
        name: 'Methode',
        data: {!!json_encode($methode)!!}
    }, {
        name: 'Material',
        data: {!!json_encode($material)!!}
    },{
        name: 'Mileau',
        data: {!!json_encode($mileau)!!}
    }]
});

// Data retrieved from:
// - https://en.as.com/soccer/which-teams-have-won-the-premier-league-the-most-times-n/
// - https://www.statista.com/statistics/383679/fa-cup-wins-by-team/
// - https://www.uefa.com/uefachampionsleague/history/winners/
Highcharts.chart('chart2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Report CAPA by Status',
        align: 'center'
    },
    xAxis: {
        categories: {!!json_encode($alldept)!!},
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Amount of CAPA'
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none'
            }
        }
    },
    legend: {
        reversed: true
    },
    
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [  {
        name: 'Done',
        data: {!!json_encode($capadone)!!}
    }, {
        name: 'Cancel',
        data: {!!json_encode($capacancel)!!}
    }, {
        name: 'Closed',
        data: {!!json_encode($capaclose)!!}
    }, {
        name: 'Open',
        data: {!!json_encode($capaopen)!!}
    },]
});
</script>

@endsection