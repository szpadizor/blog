
$(document).ready(function () {



$('#sorter_by_date').click(function () {

    var c = jQuery.makeArray($(".sort_in_this div.sort"));
       c.sort(function (a, b) {
       a = $(a).attr("data-sort");
       b = $(b).attr("data-sort");

        return b - a
       });

    c.reverse();

     $(c).appendTo(".sort_in_this")

});
});


$(document).ready(function () {


$('#sorter_by_views_up').click(function () {

    var c = jQuery.makeArray($(".sort_in_this div.sort"));
    c.sort(function (a, b) {
        a = $(a).attr("v-sort");
        b = $(b).attr("v-sort");

        return b - a
    });
    c.reverse();

    $(c).appendTo(".sort_in_this")

});


});

/*
$(window).load(function () {
    alert ('/');
})
*/
$(document).ready(function () {



    $('#sorter_by_date_up').click(function () {

        var c = jQuery.makeArray($(".sort_in_this div.sort"));
        c.sort(function (a, b) {
            a = $(a).attr("data-sort");
            b = $(b).attr("data-sort");

            return b - a
        });

       // c.reverse();

        $(c).appendTo(".sort_in_this")

    });
});


$(document).ready(function () {


    $('#sorter_by_views').click(function () {

        var c = jQuery.makeArray($(".sort_in_this div.sort"));
        c.sort(function (a, b) {
            a = $(a).attr("v-sort");
            b = $(b).attr("v-sort");

            return b - a
        });
        // c.reverse();

        $(c).appendTo(".sort_in_this")

    });


});