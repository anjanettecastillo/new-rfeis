var config_org = {
	type: 'doughnut',
	data: {
		datasets: [{
			data: [20,20,20,20,20],
			backgroundColor: [
				window.chartColors.red,
				window.chartColors.orange,
				window.chartColors.yellow,
				window.chartColors.green,
				window.chartColors.blue,
			],
			label: 'Organizations'
		}],
		labels: [
				'CS',
				'MS',
				'JPSME',
				'JPMAP',
				'JPIA'
		]
	},
	options: {
		responsive: true,
		legend: {	
			position: 'left',
			labels: {
				usePointStyle: true
			}
		},
		title: {
			display: true,
			text: 'Organizations'
		},
		animation: {
			animateScale: true,
			animateRotate: true
		}
	}
};
var config_gender = {
	type: 'doughnut',
	data: {
	datasets: [{
		data: [80,20],
		backgroundColor: [
			window.chartColors.blue,
			window.chartColors.red,
		],
		label: 'Gender'
	}],
	labels: [
			'Male',
			'Female',
		]
	},
	options: {
		responsive: true,
		legend: {	
			position: 'left',
			labels: {
				usePointStyle: true
			}
		},
		title: {
			display: true,
			text: 'Gender'
		},
		animation: {
			animateScale: true,
			animateRotate: true
		}
	}
};
var config_course = {
	type: 'pie',
	data: {
	datasets: [{
		data: [10,20,30,40,50,60,70],
		backgroundColor: [
			window.chartColors.blue,
			window.chartColors.red,
			window.chartColors.purple,
			window.chartColors.grey,
			window.chartColors.orange,
			window.chartColors.green,
			window.chartColors.yellow,
		],
		label: 'Courses'
	}],
	labels: [
			'DICT',
			'BSIT',
			'MM',
			'HR',
			'BSA',
			'BSOA',
			'DOMT',
		]
	},
	options: {
		responsive: true,
		legend: {	
			position: 'left',
			labels: {
				usePointStyle: true
			}
		},
		title: {
			display: true,
			text: 'Courses'
		},
		animation: {
			animateScale: true,
			animateRotate: true
		}
	}
};
// var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var config_month = {
	type: 'line',
	data: {
		labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
		datasets: [{
			label: 'Female Students with sanction',
			backgroundColor: window.chartColors.red,
			borderColor: window.chartColors.red,
			data: [10,20,30,40,35,5,70],
			fill: false,
		}, {
			label: 'Male Students with Sanction',
			fill: false,
			backgroundColor: window.chartColors.blue,
			borderColor: window.chartColors.blue,
			data: [15,25,10,46,80,90,35],
		}]
	},
	options: {
		responsive: true,
		legend: {	
			position: 'bottom',
			labels: {
				usePointStyle: true
			}
		},
		title: {
			display: true,
			text: 'Sanctions Recorded Per Month'
		},
		tooltips: {
			mode: 'index',
			intersect: false,
		},
		hover: {
			mode: 'nearest',
			intersect: true
		},
		scales: {
			x: {
				display: true,
				scaleLabel: {
					display: true,
					labelString: 'Month'
				}
			},
			y: {
				display: true,
				scaleLabel: {
					display: true,
					labelString: 'Value'
				}
			}
		}
	}
};
var horizontalBarChartData = {
	type: 'horizontalBar',
	data: {
		labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
		datasets: [{
			label: 'Dataset 1',
			backgroundColor:window.chartColors.red ,
			borderColor: window.chartColors.red,
			borderWidth: 1,
			data: [10,20,30,40,35,5,70]
		}, {
			label: 'Dataset 2',
			backgroundColor: window.chartColors.blue,
			borderColor: window.chartColors.blue,
			data: [15,25,10,46,80,90,35]
		}],
	},
	options: {
		elements: {
			rectangle: {
				borderWidth: 2,
			}
		},
		responsive: true,
		legend: {
			position: 'bottom',
			labels: {
				usePointStyle: true
			}
		},
		title: {
			display: true,
			text: 'Sanctions Per Course'
		}
	}
};

window.onload = function() {
	var ctx_org = document.getElementById('chart-org').getContext('2d');
	ctx_org.canvas.width = 500;
	ctx_org.canvas.height = 550;
	window.org = new Chart(ctx_org, config_org);

	var ctx_gender = document.getElementById('chart-gender').getContext('2d');
	ctx_gender.canvas.width = 500;
	ctx_gender.canvas.height = 550;
	window.gender = new Chart(ctx_gender, config_gender);

	var ctx_course = document.getElementById('chart-course').getContext('2d');
	ctx_course.canvas.width = 500;
	ctx_course.canvas.height = 550;
	window.course = new Chart(ctx_course, config_course);

	var ctx_month = document.getElementById('canvas-month').getContext('2d');
	ctx_month.canvas.width = 500;
	window.month = new Chart(ctx_month, config_month);

	var ctx_bar = document.getElementById('canvas-bar').getContext('2d');
	ctx_bar.canvas.width = 500;
	ctx_bar.canvas.height = 650;
	window.myHorizontalBar = new Chart(ctx_bar, horizontalBarChartData);
};

