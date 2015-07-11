/**
 * Created by szymon on 06.07.15.
 */


function WyslijDane () {


    Array.prototype.associate = function (arr) {
        var index,
            output = Object.create(null);

        for (index = 0; index < this.length; index++) {
            output[arr[index]] = this[index];
        }

        return output;
    };

    var wynik = [];
    var atribs = ["nie", "nag", "sro", "wyg", "grp"];
    var ciag = {};

    $('#gloski_save').click(function () {


        console.log(ciag);
        var answer = '';
        for (var key in ciag) {

            answer += '' + key + ':' + ciag[key];
        }
        console.log(answer);

        $.ajax({
            url : Routing.generate('dodaj_gloski_ajax'),
            type: "POST",
            data : ciag,
            processData : false,
            success: function(dane) {
                // Replace current position field ...


                // $('#aktorzy').empty();
                // $('#aktorzy').append(html);
                alert(dane);

                // is working !! $("#odpowiedz").append(dane);

                //var result = $('<div />').append(dane).find('#aktorzy').html();
                //$('#aktorzy').html(result);
                //$('#aktorzy').replaceWith
                //($(dane).find('#aktorzy'));
                //$('#aktorzy').replaceWith(
                // ... with the returned one from the AJAX response.
                //      $(html).find('aktorzy')

                // Position field now displays the appropriate positions.
            }
        });



    });


    $(":input").change(function () {
        wynik = $("#group").find(":checkbox")
            .map(function () {
                return this.checked;
            })
            .get();


        ciag = wynik.associate(atribs);


    });

};