<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      slotMinTime: '08:00',
      slotMaxTime: '20:00',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      initialView: 'dayGridMonth',
      initialDate: '<?= date('Y-m-d') ?>',
      navLinks: true, // can click day/week names to navigate views
      editable: false,
      selectable: true,
      nowIndicator: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        <?php foreach ($reservations as $details) : ?>
            {
                title: '<?= $details['event_name'] ?>',
                start: '<?= $details['reservation_date'].'T'.$details['reservation_starting_time']?>',
                end: '<?= $details['reservation_date'].'T'.$details['reservation_end_time']?>',
                url: '<?='/reservations/v/'.$details['id'];?>'
            },
        <?php endforeach?>
      ]
    });

    calendar.render();
  });
</script>