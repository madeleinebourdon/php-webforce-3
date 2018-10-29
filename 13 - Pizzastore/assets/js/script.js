$(".filters input").change(function() { // when inputs inside of "tiers" change value
    if ($('#check-tomato').is(':checked')) {
        $(".tomato").show();
    } else {
        $(".tomato").hide();
    }

    if ($('#check-cream').is(':checked')) {
        $(".cream").show();
    } else {
        $(".cream").hide();
    }
});