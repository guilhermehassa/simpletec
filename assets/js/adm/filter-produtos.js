var botaoFiltro = document.querySelector('.filter__form-send');
var formFiltro = document.querySelector('.filter__form');

function filtrarProdutos(){
  var numero = document.querySelector('#filter-numero').value;
  var nome = document.querySelector('#filter-nome').value;
  var status = document.querySelector('#filter-status').value;
  var categoria = document.querySelector('#filter-categoria').value;
  var destaque = document.querySelector('#filter-destaque').value;
  var foto = document.querySelector('#filter-foto').value;

  window.location.href = 'produtos.php?pesquisa=sim&numero='+numero+'&nome='+nome+'&status='+status+'&categoria='+categoria+'&destaque='+destaque+'&foto='+foto;
  
}

botaoFiltro.addEventListener('click',function(){
  filtrarProdutos();
  // console.log('produtos.php?pesquisa=sim&numero='+numero+'&nome='+nome+'&status='+status+'&categoria='+categoria+'&destaque='+destaque+'&foto='+foto);
});

formFiltro.addEventListener("keyup", function(event) {
  event.preventDefault();
  if (event.keyCode === 13) {
    filtrarProdutos();
  }
});