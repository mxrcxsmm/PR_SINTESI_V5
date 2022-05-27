function alerta(variable) {

    Swal.fire({
        title: 'Desea Reservarlo?',
        text: "Se te notificara cuando este disponible",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si , reservalo'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Reservado',
                'Recibira un correo en los proximos dias',
                'success'
            )
        }
    })

}