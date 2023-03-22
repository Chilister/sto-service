<div id="calendar"></div>
<script src=" https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js "></script>
<script>
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        expandRows: true,
        locale: 'uk',
        slotMinTime: '8:00:00',
        slotMaxTime: '19:00:00',
        events: @json($events),
    });

    calendar.render();
</script>

