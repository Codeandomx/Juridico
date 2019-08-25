$(document).ready(function() {

	/* initialize the external events
	-----------------------------------------------------------------*/

	$('#external-events .fc-event').each(function() {

		// store data so the calendar knows to render an event upon drop
		$(this).data('event', {
			title: $.trim($(this).text()), // use the element's text as the event title
			stick: true // maintain when user navigates (see docs on the renderEvent method)
		});

	
	});

	/* initialize the calendar
	-----------------------------------------------------------------*/

	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'year,month,agendaWeek,agendaDay'
		},
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		events: [
			{
				title: 'All Day Event',
				start: '2018-11-01'
			},
			{
				title: 'Long Event',
				color : '#990000',
				start: '2018-11-07',
				end: '2018-11-10'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: '2018-11-09T16:00:00'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: '2018-11-16T16:00:00'
			},
			{
				title: 'Conference',
				start: '2018-11-11',
				end: '2018-11-13'
			},
			{
				title: 'Meeting',
				start: '2018-11-12T10:30:00',
				end: '2018-11-12T12:30:00'
			},
			{
				title: 'Lunch',
				start: '2018-11-12T12:00:00'
			},
			{
				title: 'Meeting',
				start: '2018-11-12T14:30:00'
			},
			{
				title: 'Happy Hour',
				start: '2018-11-12T17:30:00'
			},
			{
				title: 'Dinner',
				start: '2018-11-12T20:00:00'
			},
			{
				title: 'Birthday Party',
				start: '2018-11-13T07:00:00'
			},
			{
				title: 'Click for Google',
				url: 'http://google.com/',
				start: '2018-11-28'
			}
		],
		droppable: true, // this allows things to be dropped onto the calendar
		drop: function() {
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
		}
	});

});