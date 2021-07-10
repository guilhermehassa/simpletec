var botaoPesquisa = document.querySelector('.nav__pesquisa-lupa');

var buscaTexto = document.querySelector('.nav__pesquisa-input').value;
var buscaCategoria = document.querySelector('.nav__pesquisa-categoria').value;
var buscaStatus = document.querySelector('.nav__pesquisa-status').value;

function efetivarPesquisa(){
  var buscaTexto = document.querySelector('.nav__pesquisa-input').value;
  var buscaCategoria = document.querySelector('.nav__pesquisa-categoria').value;
  var buscaStatus = document.querySelector('.nav__pesquisa-status').value;

  window.location.href = 'https://papelaria.simple.tec.br/index.php?cat=pesq&categoria='+buscaCategoria+'&pesq='+buscaTexto+'&status='+buscaStatus;

}

botaoPesquisa.addEventListener('click',function(event){
  efetivarPesquisa();
});