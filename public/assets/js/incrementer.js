function up(max, counter) {
    
    var input = "mynumber" + counter;
    var chckbx = "equip_" + counter;
    document.getElementById(input).value = parseInt(document.getElementById(input).value) + 1;
    document.getElementById(chckbx).checked = true;
    if (document.getElementById(input).value >= parseInt(max)) {
        document.getElementById(input).value = max;
    }
}
function down(min, counter) {
    var input = "mynumber" + counter;
    var chckbx = "equip_" + counter;
    document.getElementById(input).value = parseInt(document.getElementById(input).value) - 1;
    if (document.getElementById(input).value <= parseInt(min)) {
        document.getElementById(input).value = min;
        document.getElementById(chckbx).checked = false;
    }
}
function add(max, counter) {
    
    var input = "quantity" + counter;
    document.getElementById(input).value = parseInt(document.getElementById(input).value) + 1;
    if (document.getElementById(input).value >= parseInt(max)) {
        document.getElementById(input).value = max;
    }else if(document.getElementById(input).value == ''){
        document.getElementById(input).value = 1;
    }
}
function subtract(min, counter) {
    var input = "quantity" + counter;
    document.getElementById(input).value = parseInt(document.getElementById(input).value) - 1;
    if (document.getElementById(input).value <= parseInt(min)) {
        document.getElementById(input).value = min;
    }else if(document.getElementById(input).value == ''){
        document.getElementById(input).value = 0;
    }
}

function returnValue(quantity, counter){
    var input = "#quantity" + counter;
    var inputVal = parseInt($(input).val());

    if(inputVal > quantity){
        $(input).val(quantity);
    }else if(inputVal < 0){
        $(input).val("0");
    }else{
        $(input).val(inputVal);
    }
}

function ifChecked(counter){
    var chckbx = "equip_" + counter;
    var input = "mynumber" + counter;
    if(document.getElementById(chckbx).checked){
        document.getElementById(input).value = 1;
    }else{
        document.getElementById(input).value = 0;
    }
}

$(document).ready(function(){
    $('#budget').keyup(function(){
        var hours = parseInt($('#h-hour').val());
        var fee = parseInt($('#h-fee').val());
        var initFee = hours * fee;
        $('#i-fee').val(initFee);
    });
});

$(document).ready(function(){
    $('#check-info').click(function(){
        var eventName = $('#event-name').val();
        var eventType = $('#type').val();
        var faculty = $('#faculty').val();
        var reservationDate = $('#datepicker').val();
        var startTime = $('#start-time').val();
        var endTime = $('#end-time').val();
        var budget = $('#budget').val();
        var participants = $('#participants').val();
        var select;
        if(eventType == 1){
            select = $('#org-id').val();
        }else if(eventType == 2){
            select = $('#course-id').val();
        }
        $('#preview').empty();
        $('#preview').hide();
        $.post(
            '/reservations/preview',
            {
                event_name: eventName,
                event_type: eventType,
                faculty: faculty,
                date: reservationDate,
                start: startTime,
                end: endTime,
                budget: budget,
                participants: participants,
                event_select: select,
            },
            function(data){
                $('#preview').show();
                var view = '<table class="table table-striped">';
                view += '<tbody>';
                view += '<tr>';
                view += '<td><b>Event Name</b></td>';
                view += '<td>'+ data.event_name +'</td>';
                view += '</tr>';
                view += '<tr>';
                view += '<td><b>Event Type</b></td>';
                view += '<td>'+ data.type +'</td>';
                view += '</tr>';
                view += '<tr>';
                view += '<td><b>Course/Organization</b></td>';
                view += '<td>'+ data.type_data +'</td>';
                view += '</tr>';
                view += '<tr>';
                view += '<td><b>Event Name</b></td>';
                view += '<td>'+ data.event_name +'</td>';
                view += '</tr>';
                view += '<tr>';
                view += '<td><b>Professor/Adviser</b></td>';
                view += '<td>'+ data.faculty +'</td>';
                view += '</tr>';
                view += '<tr>';
                view += '<td><b>Reservation Date</b></td>';
                view += '<td>'+ data.date +'</td>';
                view += '</tr>';
                view += '<tr>';
                view += '<td><b>Reservation Starting Time</b></td>';
                view += '<td>'+ data.start +'</td>';
                view += '</tr>';
                view += '<tr>';
                view += '<td><b>Reservation End Time</b></td>';
                view += '<td>'+ data.end +'</td>';
                view += '</tr>';
                view += '<tr>';
                view += '<td><b>Budget</b></td>';
                view += '<td>'+ data.budget +'</td>';
                view += '</tr>';
                view += '<tr>';
                view += '<td><b>Number of Participants</b></td>';
                view += '<td>'+ data.participants +'</td>';
                view += '</tr>';
                view += '</tbody>';
                view += '</table>';

                $('#preview').prepend(view);
            },
        );
    });
});