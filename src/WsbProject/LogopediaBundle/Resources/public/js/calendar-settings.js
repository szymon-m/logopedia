$(function () {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    var pierwsze =  {

        start: '15:00', // a start time (10am in this example)
        end: '18:00', // an end time (6pm in this example)

        dow: [ 3, 4 ]
        // days of week. an array of zero-based day of week integers (0=Sunday)
        // (Monday-Thursday in this example)
        };

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
                setHeight: 400,
                timeFormat: 'HH:mm'
                // options apply to basicWeek and agendaWeek views
            },
            month: {
                titleFormat: 'MMMM YYYY',
                timeFormat: 'HH:mm'
            }
        },
        defaultView: 'agendaWeek',
        minTime: czasOd,
        maxTime: czasDo,
        slotDuration: '00:15:00',
        editable: true,
        eventLimit: true,
        businessHours:[

            pierwsze,

            {

                start: '15:00', // a start time (10am in this example)
                end: '18:00', // an end time (6pm in this example)

                dow: [ 3, 4 ]
                // days of week. an array of zero-based day of week integers (0=Sunday)
                // (Monday-Thursday in this example)
            }

        ],
        eventClick: function(event, element) {

            $("#startTime").html(moment(event.start).format('D MMMM YYYY HH:mm'));
            $("#endTime").html(moment(event.end).format('dd MMMM YYYY HH:mm'));
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

            var dane = { imie: "nieznane"};
            $.ajax({

                url: Routing.generate('pobierz_pacjentow'),
                type: "POST",
                data: dane,
                success: function(dane) {

                    $('select#pacjent').html(dane);

                }


            });
            $("#startTime").html(moment(start).format('D MMMM YYYY HH:mm'));
            $("#endTime").html(moment(end).format('dd MMMM YYYY HH:mm'));


            $("#dodaj_nowe_spotkanie").dialog({
                height: 300,
                width: 350,
                modal: true,
                buttons: {
                    "Dodaj spotkanie": dodajSpotkanie,
                    "Anuluj" : function() {
                        $("#dodaj_nowe_spotkanie").dialog( "close" );
                    }
                }});


            // działajace /*
            /*$('select#pacjent').on('click',  function () {

             console.log("zmiana");
             }); */
            function dodajSpotkanie () {

                var dane = {};

                //var id_pacjenta = $('#pacjent').val();

                var first = 1;

                var startTime = moment(start).format('YYYY-MM-DD\THH:MM:SS');
                var endTime = moment(end).format('YYYY-MM-DD\THH:MM:SS');


                var allday = '0';
                var done ='1';
                var id_pacjenta = $('select#pacjent').val();
                var wybrany = $('#pacjent option:selected').text();
                var uwagi = $('#uwagi').val();

                var dane = {
                    start: start.format(),
                    end: end.format(),
                    alldayevent: allday,
                    uwagi : uwagi,
                    first: first,
                    done: done,
                    id_pacjenta: id_pacjenta
                };


                $.ajax({
                    url: Routing.generate('dodaj_zdarzenie'),

                    data: dane,
                    type: "POST",
                    success: function(json) {
                        alert('Added Successfully');
                    }
                });
                $("#dodaj_nowe_spotkanie").dialog( "close" );

                $('#calendar-holder').fullCalendar('renderEvent',
                    {
                        title: wybrany,
                        start: start.format(),
                        end: end.format(),
                        alldayevent: dane.alldayevent
                    },
                    true // make the event "stick"
                );

                $('#calendar-holder').fullCalendar('unselect');
            };




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
