var textoMostrado = document.querySelector('#texto-mostrado');
var catalogoBotoes = document.querySelector('.catalogo__botoes');

catalogoBotoes.addEventListener('click',function(event){

  clicado=event.target;
  if(clicado.classList!='catalogo__botoes'){
    if(event.target.classList == 'catalogo__botao-titulo'){
      clicado=clicado.parentNode;
    }

    var qtdFilhos = clicado.parentNode.childElementCount;
    var c=0;
    while (c < qtdFilhos){
      catalogoBotoes.children[c].classList.remove('catalogo__botao-ativo');
      c++;
    }

    clicado.classList.add('catalogo__botao-ativo');
    

    var textoSelecionado = clicado.children[1].textContent;
    textoMostrado.classList.add('catalogo__texto-inativo');
    setTimeout(function() {
      textoMostrado.textContent='';
    },300);

    setTimeout(function() {
      textoMostrado.classList.remove('catalogo__texto-inativo');
      textoMostrado.textContent = textoSelecionado;
    },600);
  
  }
  
  
  
});