var botaoFiltro = document.querySelector('.filter__form-send');
var formFiltro = document.querySelector('.filter__form');

function filtrarCategoria(){
  var numero = document.querySelector('#filter-numero').value;
  var nome = document.querySelector('#filter-nome').value;
  var status = document.querySelector('#filter-status').value;

  window.location.href = 'categorias.php?pesquisa=sim&numero='+numero+'&nome='+nome+'&status='+status;

}

botaoFiltro.addEventListener('click',function(){
  filtrarCategoria();
});

formFiltro.addEventListener("keyup", function(event) {
  event.preventDefault();
  if (event.keyCode === 13) {
    filtrarCategoria();
  }
});