var today = new Date();
var m = today.getMonth() + 1;
var mes = (m < 10) ? '0' + m : m;
document.getElementById("fecha").innerHTML = 'Fecha: ' + today.getDate() + '/' + mes + '/' + today.getFullYear();
