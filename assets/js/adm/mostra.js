var mostra = document.querySelector('.mostra');
var mostraImg = document.querySelector('.mostra__img');
var mostraForm = document.querySelector('.mostra__form');
var fechaMostra = document.querySelector('.mostra__close');
var textoForm = document.querySelector('.mostra__legend-editavel');
var tituloForm=document.querySelector('#mostra-titulo');
var objetivoForm = mostra.querySelector('#objetivo-formulario');

fechaMostra.addEventListener('click',function(event){
  fecharMostra();
});