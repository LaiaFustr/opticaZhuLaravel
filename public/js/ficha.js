$boolBoton = false;
$('#checksFicha input[type="checkbox"]').change(function() {

    let id = $(this).attr("id").replace('Check', '');

    if ($(this).is(':checked')) {
        console.log(id);
        $('#' + id).show();
        $boolBoton = true;

    } else {
        $('#' + id).hide();
        $boolBoton = false;
        $('#checksFicha input[type="checkbox"]').each(function() {
            if ($(this).is(':checked'))
                $boolBoton = true;
        });
    }


    if ($boolBoton == true) {
        console.log('HOLIWIS')
        $('#creaFicha').show();
    } else {
        $('#creaFicha').hide();

    }

});