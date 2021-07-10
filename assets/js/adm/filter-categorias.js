var botaoFiltro = document.querySelector('.filter__form-send');

function filtrarCategoria(){
  alert('teste');
  var numero = document.querySelector('#filter-numero').value;
  var nome = document.querySelector('#filter-nome').value;
  var status = document.querySelector('#filter-status').value;

  window.location.href = 'categorias.php?pesquisa=sim&numero='+numero+'&nome='+nome+'&status='+status;

}

botaoFiltro.addEventListener('click',function(){
  filtrarCategoria();
});