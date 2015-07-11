$(function () {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();



    $('#calendar-holder').fullCalendar({
        lang: 'pl',
        header: {
            left: 'prev, next',
            center: 'title',
            right: 'month, agendaWeek'
        },
        views: {
            agenda: {
                titleFormat: 'MMMM YYYY',
                timeFormat: 'HH:mm'
                // options apply to agendaWeek and agendaDay views
            },
            week: {
                timeFormat: 'HH:mm'
                // options apply to basicWeek and agendaWeek views
            },
            month: {
                titleFormat: 'MMMM YYYY',
                timeFormat: 'HH:mm'
            }
        },
        defaultView: 'agendaWeek',
        editable: true,
        eventLimit: true,
        businessHours: {
            start: '15:00', // a start time (10am in this example)
            end: '18:00', // an end time (6pm in this example)

            dow: [ 1,2, 3, 4 ]
            // days of week. an array of zero-based day of week integers (0=Sunday)
            // (Monday-Thursday in this example)
        },
        eventClick: function(event, element) {

            $("#startTime").html(moment(event.start).format('dD MMMM YYYY HH:mm'));
            $("#endTime").html(moment(event.end).format('dD MMMM YYYY HH:mm'));
            $("#eventInfo").html(event.description);
            $("#eventLink").attr('href', event.url);
            $("#eventContent").dialog({ modal: true, title: event.title, width:350})


            event.title = "CLICKED!";

            $('#calendar').fullCalendar('updateEvent', event);

        },
        selectable: true,
        selectHelper: true,
        ////////////////////////////////////////////////

        ////////////////////////////////////////////////
        select: function(start, end, jsEvent, view) {

            var title = prompt('Tytuł:');
            var url = prompt('URL:');
            var description = prompt('Opis:');
            var location = prompt('Gdzie:');
            var contact = prompt('Kontakt');

                var startTime = moment(start).format('YYYY-MM-DD\THH:MM:SS');
                var endTime = moment(end).format('YYYY-MM-DD\THH:MM:SS');

                var allday = '0';

                $.ajax({
                    url: Routing.generate('dodaj_zdarzenie'),

                    data: 'title='+ title+'&start='+ startTime +'&end='+ endTime +'&url='+ url+ '&description='+ description
                    + '&location=' + location + '&contact=' + contact + '&alldayevent=' + allday,
                    type: "POST",
                    success: function(json) {
                        alert('Added Successfully');
                    }
                });
                $('#calendar').fullCalendar('renderEvent',
                    {
                        title: title,
                        start: start,
                        end: end,
                        allDay: allDay
                    },
                    true // make the event "stick"
                );

            $('#calendar').fullCalendar('unselect');
        },

        eventSources: [
            {
                url: Routing.generate('fullcalendar_loader'),
                type: 'POST',
                // A way to add custom filters to your event listeners
                data: {
                },
                error: function() {
                    //alert('There was an error while fetching Google Calendar!');
                }
            }
        ]
    });

});
