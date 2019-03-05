<div class="modal-content">
      <button type="button" class="close close_edit_modal" data-dismiss="modal">&times;</button>
    <div class="modal-body">
        <div id='calendarFilter'></div>
    </div>
</div>
<script src='<?php echo base_url(); ?>assets/js/moment.min.js'></script>
<script src='<?php echo base_url(); ?>assets/js/fullcalendar.min.js'></script>
<link href='<?php echo base_url(); ?>assets/css/fullcalendar.min.css' rel='stylesheet' />
<script>

  $(document).ready(function() {
    $('#calendarFilter').fullCalendar({
      defaultDate: '<?php echo date('Y-m-d') ?>',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '<?php echo date('Y-m-d') ?>'
        },
        {
          title: 'Long Event',
          start: '2018-01-07',
          end: '2018-01-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2018-01-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2018-01-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '<?php echo date('Y-m-d') ?>',
        },
        {
          title: 'Meeting',
          start: '2018-01-12T10:30:00',
          end: '2018-01-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2018-01-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2018-01-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2018-01-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2018-01-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2018-01-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2018-01-28'
        }
      ]
    });

  });

</script>
<style>
  #calendarFilter {
    max-width: 900px;
    margin: 0 auto;
  }
  .close {
    margin-right: -12px;
    margin-top: -16px;
  }
</style>
