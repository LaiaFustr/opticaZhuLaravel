$('#checksFicha input[type="checkbox"]').change(function() {

    let id = $(this).attr("id").replace('Check', '');

    if ($(this).is(':checked')) {
        console.log(id);
        $('#' + id).show();

    } else {
        $('#' + id).hide();
    }

});