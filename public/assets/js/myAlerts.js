function alert_error(message){
	 Swal.fire({
		  icon: 'error',
		  title: 'Oops!',
		  text: message,
		});
}

function alert_success(message){
	 Swal.fire(
	  'Success!',
	  message,
	  'success'
	);
}

function alert_login_success(message){
	 Swal.fire(
	  'Login Success!',
	  message,
	  'success'
	);
}

function confirmDelete(route, id){
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!',
		allowOutsideClick: false,
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 1000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					url: route + id,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							window.location.reload();
						});
					},
					error: function () {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						});
					}
				});
			});
		}
	});
}

function confirmReassess(route){
	Swal.fire({
		title: 'Are you sure?',
		text: "You can revert this action anytime.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 2000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					url: route,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							window.location.reload();
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
							allowOutsideClick: false,
						});
					}
				});
			})
		}
	});
}

function approveReservation(route){
	var remarks = $("#remarks-app").val()
	var fee = $("#fee").val()

	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
		allowOutsideClick: false,
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 2000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					url: route,
					type: "POST",
					data: {
						remarks: remarks,
						reservation_fee: fee,
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
							allowOutsideClick: false,
						}).then((confirm) => {
							$("#approve").modal("hide");
							window.location.reload();
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
							allowOutsideClick: false,
						}).then((confirm) => {
							$("#approve").modal("hide");
						});
					}
				});
			})
		}
	});
}

function freeReservation(route){
	var remarks = $("#remarks-app").val()

	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 2000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					url: route,
					type: "POST",
					data: {
						remarks: remarks
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#approve").modal("hide");
							window.location.reload();
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#approve").modal("hide");
						});
					}
				});
			});
		}
	});
}

function rejectReservation(route){
	var remarks = $("#remarks-app").val()

	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 2000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					url: route,
					type: "POST",
					data: {
						remarks: remarks
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#reject").modal("hide");
							window.location.reload();
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#reject").modal("hide");
						});
					},
				});
			})
		}
	});
}

function endReservation(route){
	var remarks = $("#remarks-end").val();
	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 2000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					type: "post",
					url: route,
					data: {
						remarks: remarks,
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#end").modal("hide");
							window.location.reload();
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#end").modal("hide");
						});
					},
				});
			})
		}
	});
}
function cancelReservation(route){
	var remarks = $("#remarks-cancel").val();
	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 2000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					type: "post",
					url: route,
					data: {
						remarks: remarks,
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#cancel").modal("hide");
							window.location.reload();
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#cancel").modal("hide");
						});
					}
				});
			})
		}
	});
}

function verifyReservation(route){
	var remarks = $("#remarks-verify").val();
	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 2000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					type: "post",
					url: route,
					data: {
						remarks: remarks,
					},
					cache: false,
					success: function (response) {
						console.log("OK");
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#verify").modal("hide");
							window.location.reload();
						});
					},
					error: function (response) {
						console.log("OK");
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							$("#verify").modal("hide");
						});
					}
				});
			})
		}
	});
}

function returnEquipment(counter){
	var id_remarks = '#remarks'+counter;
	var id_status = '#status'+counter;
	var id_condition = '#condition'+counter;
	var id_quantity = '#quantity'+counter;

	var remarks = $(id_remarks).val();
	var status = $(id_status).val();
	var condition = $(id_condition).val();
	var quantity = $(id_quantity).val();

	var btn_apply = '#apply' + counter;
	var btn_undo = '#undo' + counter;
	var btn_add = '.btn-incrementer' + counter;
	var btn_sub = '.btn-decrementer' + counter;

	var route = "/reservations/return/" + counter;

	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 2000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					type: "post",
					url: route,
					data: {
						remarks: remarks,
						status: status,
						conditions: condition,
						quantity: quantity,
					},
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							console.log('Success');
							$(btn_apply).attr("disabled", true);
							$(id_condition).attr("disabled", true);
							$(id_quantity).attr("disabled", true);
							$(id_status).attr("disabled", true);
							$(id_remarks).attr("disabled", true);
							$(btn_add).addClass("disabled");
							$(btn_sub).addClass("disabled");
							$('#return-eq')[0].reset();
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						});
					}
				});
			})
		}
	});
	$('#return-eq')[0].reset();
}

function undoEquipment(counter){
	var id_remarks = '#remarks' + counter;
	var id_status = '#status' + counter;
	var id_condition = '#condition' + counter;
	var id_quantity = '#quantity' + counter;

	var btn_apply = '#apply' + counter;
	var btn_undo = '#undo' + counter;
	var btn_add = '.btn-incrementer' + counter;
	var btn_sub = '.btn-decrementer' + counter;

	var route = "/reservations/undo-return/" + counter;

	Swal.fire({
		title: 'Are you sure?',
		text: "You can't revert this action anymore.",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, continue',
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Processing...',
				html: 'Please wait.',
				icon: 'info',
				timer: 2000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading()
				},
			}).then((result) => {
				$.ajax({
					type: "post",
					url: route,
					cache: false,
					success: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						}).then((confirm) => {
							console.log('Success');
							$(btn_undo).hide();
							$(btn_apply).show();
							$(btn_apply).attr("disabled", false);
							$(id_condition).attr("disabled", false);
							$(id_quantity).attr("disabled", false);
							$(id_status).attr("disabled", false);
							$(id_remarks).attr("disabled", false);
							$(btn_add).removeClass("disabled");
							$(btn_sub).removeClass("disabled");
						});
					},
					error: function (response) {
						Swal.fire({
							title: response.status,
							text: response.status_text,
							icon: response.status_icon,
						});
					}
				});
			})
		}
	});
	$('#return-eq')[0].reset();
}

$(document).ready(function(){

	$('#reload-page').click(function(){
		$('#return-equipment').modal('hide')
		Swal.fire(
			'Save Successfully',
			'Applied changes',
			'success'
		).then((confirm) => {
			window.location.reload();
		});
	});

	$('#reset-form').click(function(){
		$('#return-eq')[0].reset();
	});
});