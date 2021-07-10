function retirarAscentos(titulo){
    var tituloSemAscento = titulo.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
    var novoTitulo = transformarEmMinusculas(tituloSemAscento);
    return novoTitulo;
}

function transformarEmMinusculas(titulo){
    tituloMinusculo = titulo.toLowerCase();
    return tituloMinusculo;
} 

var tituloCompleto = document.title;
var titulo = tituloCompleto.split(" ");
var tituloOficial = retirarAscentos(titulo[0]);
    
var menuAtivo = document.querySelector("#menu-"+tituloOficial);
menuAtivo.classList.add("menu__li-ativo");

var cubeAtive = menuAtivo.querySelector('.menu__cube');
cubeAtive.classList.add("cube");