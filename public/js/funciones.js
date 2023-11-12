function confirmAlert(pregunta, ruta) {
    jConfirm(pregunta, 'Categorias', function (r) {
        if (r) {
            window.location = ruta;
        }
    });
}