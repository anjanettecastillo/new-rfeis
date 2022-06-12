document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        // plugins: ['interaction', 'dayGrid', 'timeGrid'],
        plugins: ['dayGrid', 'timeGrid'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        defaultDate: '2020-02-12',
        navLinks: true, // can click day/week names to navigate views
        selectable: false,
        selectMirror: true,
        // select: function (arg) {
        //     var title = prompt('Event Title:');
        //     if (title) {
        //         calendar.addEvent({
        //             title: title,
        //             start: arg.start,
        //             end: arg.end,
        //             allDay: arg.allDay
        //         })
        //     }
        //     calendar.unselect()
        // },
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [{
            title: 'All Day Event',
            start: '2020-02-01'
        }]
    });

    calendar.render();
});