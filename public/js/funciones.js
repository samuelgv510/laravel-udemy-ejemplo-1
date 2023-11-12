function confirmAlert(pregunta, ruta) {
    jConfirm(pregunta, 'Categorias', function (r) {
        if (r) {
            window.location = ruta;
        }
    });
}
function soloNumeros(evt) {
    key = (document.all) ? evt.keyCode : evt.which;
    //alert(key);
    if (key == 17) return false;
    /* digitos,del, sup,tab,arrows*/
    return ((key >= 48 && key <= 57) || key == 8 || key == 127 || key == 9 || key == 0);
}