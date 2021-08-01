var mostra = document.querySelector('.mostra');
var mostraImg = document.querySelector('.mostra__img');
var listaProdutos = document.querySelector('.produtos__ul')

listaProdutos.addEventListener('click',function(event){
  var clicado = event.target;
  var clicadoClasse = clicado.className;

  if(clicadoClasse == 'produto__img'){

    var produto = event.target;

    var srcFatiado = produto.src.split("_");
    var diretorio = srcFatiado[0].slice(0, -5);

    mostraImg.src = diretorio + srcFatiado[1];
    mostra.classList.add('mostra-on');
  }

  else if(clicado.id == 'arrow-left' || clicado.id == 'arrow-right'){
    if(clicado.id=='arrow-left'){var escolha='anterior';}
    else if(clicado.id=='arrow-right'){var escolha='proxima';}
    trocaFoto(clicado,escolha)
  }

});

mostra.addEventListener('click',function(){
  mostra.classList.remove('mostra-on');
});