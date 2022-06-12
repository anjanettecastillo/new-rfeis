$(document).ready(function () {
  $('.table').DataTable();

  $(".permissions-data").each(function () {
    var element = $(this);
    $.ajax({
      url: '/roles-permissions/r',
      type: 'get',
      data: { id: $(this).attr("id") },
      beforeSend: function () {
        element.html('Fetching Data...');
      },
      success: function (html) {
        console.log(html);
        element.html(html);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        alert(thrownError);
      }
    });
  });
});

$(document).ready(function () {
  $('.js-example-basic-multiple').select2();
  $('.faculty-select').select2();
});

var start = '7'
$('#picker1').timepicker({
  change: function (start) {
    var picker = $(this);
    $('#start-time').val(picker.val());
    var fee;
    var datePick = $('#datepicker').val();

    var pick1 = picker.val();
    var pick2 = $('#end-time').val();

    var date1 = new Date(datePick + " " + pick1);
    var date2 = new Date(datePick + " " + pick2);

    var time1 = date1.getHours();
    var time2 = date2.getHours();

    var exHour = date1.getHours() + 1;
    var exMinutes = date1.getMinutes();
    var finTime = exHour + ":" + exMinutes + ":" + "00";
    start = new Date(datePick + " " + finTime);
    fee = parseInt(time2) - parseInt(time1);
    $('#h-hour').val(fee);
    otherPicker = $('#picker2');
    otherPicker.timepicker('option', 'minTime', start);
  },
  timeFormat: 'h:mm:ss p',
  interval: 30,
  minTime: '7:30am',
  maxTime: '9:00pm',
  defaultTime: '0',
  dynamic: false,
  dropdown: true,
  scrollbar: true,
});
$('#picker2').timepicker({
  change: function () {
    var picker = $(this);
    $('#end-time').val(picker.val());
    var fee;
    var datePick = $('#datepicker').val();

    var pick1 = $('#start-time').val();
    var pick2 = picker.val();

    var date1 = new Date(datePick + " " + pick1);
    var date2 = new Date(datePick + " " + pick2);

    var time1 = date1.getHours();
    var time2 = date2.getHours();

    fee = parseInt(time2) - parseInt(time1);
    $('#h-hour').val(fee);
  },
  timeFormat: 'h:mm:ss p',
  interval: 30,
  minTime: '7:30am',
  maxTime: '9:00pm',
  defaultTime: '0',
  dynamic: false,
  dropdown: true,
  scrollbar: true,
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})