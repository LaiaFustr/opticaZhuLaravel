
    $(document).on("click", ".btn-borrar-optica", function(){
        let id = $(this).data("id");  
        let borrandourl = "{{route('borrarOptica',  ['id' => ':id']) }}";
        console.log(id);
        Swal.fire({
        title: "¿Estas seguro?",
        text: "Esta optica sera TOTALMENTE eliminada",
        icon: "warning",
        background: '#ffffff',
        color: 'black',
        showCancelButton: true,
        confirmButtonText: "Confirmar",

        cancelButtonText: "Cancelar",
        customClass: {
            confirmButton: "botonFooterModal",
        },
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = borrandourl.replace(":id", id);
        }
        });
    });