$(document).ready(function(){
    var start, date;
    $('#datepicker1').datepicker({
        minDate: '2021-08-01',
        disableDaysOfWeek: [0, 6],
        format: 'yyyy-mm-dd',
        uiLibrary: 'bootstrap4',
        header: true,
        modal: false,
        footer: false,
    });
    $('#datepicker1').change(function () {
        start = $(this).val();
        $('#datepicker2').datepicker('destroy');
        $('#datepicker2').datepicker({
            minDate: start,
            disableDaysOfWeek: [0, 6],
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            header: true,
            modal: false,
            footer: false,
        });
    });
    $('#datepicker2').datepicker({
        minDate: '2021-08-01',
        disableDaysOfWeek: [0, 6],
        format: 'yyyy-mm-dd',
        uiLibrary: 'bootstrap4',
        header: true,
        modal: false,
        footer: false,
    });

});