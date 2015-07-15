/**
 * Created by szymon on 12.07.15. autocomplete scripts
 */
<script>
$(function () {

    $("#pacjent").autocomplete({

        source: function (request, response){

            $.ajax({
                url: Routing.generate('pobierz_pacjenta'),
                dataType: "json",
                data: {
                    q: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function (event, ui) {
            log( ui.item ?
            "Wybrano" + ui.item.label :
            "Nie wybrano , wartość była" + this.value);
        },
        open: function () {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function () {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        }

    })


});

"ID:" + this.id


</script>


<script>
$(function () {

    $.ajax({

        url: Routing.generate('pobierz_pacjenta'),
        dataType: "json",
        succes: function (data) {

            $("#pacjent").autocomplete({
                source: data,
                select: function (event, ui) {
                    selectObj = ui.item;
                    alert("Wybrany to=" + selectObj.value);
                },
                minLength: 3
            });

        }

    });

});
</script>
