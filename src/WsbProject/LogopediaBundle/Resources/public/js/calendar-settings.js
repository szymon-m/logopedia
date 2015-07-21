$(function () {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    var pierwsze =  {

        start: '15:00:00', // a start time (10am in this example)
        end: '18:00:00', // an end time (6pm in this example)

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
        defaultEventDurationTime: '01:00:00',
        eventDurationEditable: false,
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
        eventDragStart : function( event, jsEvent, ui, view ) {
        },
        eventDragStop: function( event, jsEvent, ui, view ) {
        },


        eventDrop : function( zdarzenie, delta, revertFunc, jsEvent, ui, view ) {

            if(zdarzenie.done == true) {
                alert('Nie możesz przenosić zdarzeń już wykonanych');
                $('#zrobione').html('Zakończone');
            } else {
                $('#zrobione').html('Do wykonania');
            }
            var id_spotkania = zdarzenie.id_spotkania;

            $("#id_spotkania").html(id_spotkania);
            $("#poczatek").html(moment(zdarzenie.start).format('D MMMM YYYY HH:mm'));
            $("#koniec").html(moment(zdarzenie.end).format('D MMMM YYYY HH:mm'));
            $('#imie_i_nazwisko').html(zdarzenie.title);


            if(zdarzenie.done == true) {
                $('#zrobione').html('Zakończone');
            } else {
                $('#zrobione').html('Do wykonania');
            }

            if(delta) {
                $('#delta1').html(delta);
            }

            //$('#delta').html(moment(delta).format('D MMMM YYYY HH:mm'));



            $("#edytuj_spotkanie").dialog({
                height: 300,
                width: 350,
                modal: true,
                buttons: {
                    "Zapisz spotkanie": zapiszSpotkanie,
                    "Anuluj" : function() {
                        $("#edytuj_spotkanie").dialog( "close" );
                    }
                }});




            function zapiszSpotkanie () {

                var dane = {};

                var startTime = moment(zdarzenie.start).format('YYYY-MM-DD\THH:MM:SS');
                var endTime = moment(zdarzenie.end).format('YYYY-MM-DD\THH:MM:SS');

                var dane = {
                    start: zdarzenie.start.format(),
                    end: zdarzenie.end.format(),
                    id_spotkania: id_spotkania
                };


                $.ajax({
                    url: Routing.generate('popraw_zdarzenie'),

                    data: dane,
                    type: "POST",
                    success: function(json) {
                        alert('Added Successfully');

                        $("#edytuj_spotkanie").dialog( "close" );

                        $('#calendar-holder').fullCalendar('renderEvent',
                            {
                                title: zdarzenie.title,
                                start: start.format(),
                                end: end.format(),
                                alldayevent: json.alldayevent,
                                backgroundColor: json.backgroundColor,
                            },
                            true // make the event "stick"
                        );

                        $('#calendar-holder').fullCalendar('updateEvent', zdarzenie);



                    }
                });

            };




        },

        eventClick: function(event, jsEvent, view ) {


            $("#startTime").html(moment(event.start).format('D MMMM YYYY HH:mm'));
            $("#endTime").html(moment(event.end).format('D MMMM YYYY HH:mm'));
            $('#imie_nazwisko').html(event.title);
            if(event.done == true) {
                $('#done').html('Zakończone');
            } else {
                $('#done').html('Do wykonania');
            }


            $("#szczegoly_spotkania").dialog({
                height: 300,
                width: 350,
                modal: true,
                buttons: {
                    "Zapisz spotkanie": zapiszSpotkanie,
                    "Anuluj" : function() {
                        $("#szczegoly_spotkania").dialog( "close" );
                    }
                }});


            $('#calendar').fullCalendar('updateEvent', event);

            function zapiszSpotkanie () {



            };

        },
        selectable: true,
        selectHelper: true,
        ////////////////////////////////////////////////

        ////////////////////////////////////////////////
        select: function(start, end, jsEvent, view) {

            if(moment(start).isBefore(moment().format('D MMMM YYYY 00:00'))) {
                alert('Nie możesz dodawać zdarzeń przed dniem dzisiejszym');
                var done ='1';
            } else {

                var done ='0';
            }


            var dane = { imie: "nieznane"};
            $.ajax({

                url: Routing.generate('pobierz_pacjentow'),
                type: "POST",
                data: dane,
                success: function(dane) {

                    $('select#pacjent').html(dane);
                    $('select#pacjent').append( '<option value="0">---Dodaj nowego pacjenta---</option>');

                }


            });
            var godzinka = 0.75,
            end = moment(start).add(godzinka, 'hour');

            $("#startTime2").html(moment(start).format('D MMMM YYYY HH:mm'));
            $("#endTime2").html(moment(end).format('dd MMMM YYYY HH:mm'));


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

                        $("#dodaj_nowe_spotkanie").dialog( "close" );

                        $('#calendar-holder').fullCalendar('renderEvent',
                            {
                                title: wybrany,
                                start: start.format(),
                                end: end.format(),
                                alldayevent: json.alldayevent,
                                backgroundColor: json.backgroundColor,
                            },
                            true // make the event "stick"
                        );

                        $('#calendar-holder').fullCalendar('unselect');



                    }
                });

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
