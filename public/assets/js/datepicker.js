var today;
var datepicker;
var dt_day;
var workingDays;
var maxDays;
var max

dt_day = new Date();
workingDays = dt_day.getDate();

if (dt_day.getDay() == 6) {
    workingDays += 7;
} else if (dt_day.getDay() == 5) {
    workingDays += 8;
} else if (dt_day.getDay() == 0) {
    workingDays += 6;
} else {
    workingDays += 5;
}

max = workingDays + 14;

today = new Date(new Date().getFullYear(), new Date().getMonth(), workingDays);
maxDays = new Date(new Date().getFullYear(), new Date().getMonth(), max);
datepicker = $('#datepicker').datepicker({
    minDate: today,
    maxDate: maxDays,
    disableDaysOfWeek: [0, 6],
    format: 'yyyy-mm-dd',
    uiLibrary: 'bootstrap4',
    header: true,
    modal: true,
    footer: true,
});