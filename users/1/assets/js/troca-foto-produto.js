function trocaFoto(elemento,escolha){
  var fotoMostrada = elemento.parentNode.children[2]
  var totalFotos = elemento.parentNode.firstElementChild.childElementCount;
  var fotoAtual = elemento.parentNode.children[1].valueAsNumber;

  if(escolha=='anterior'){
    if(fotoAtual == 1){
      var proximaFoto = totalFotos;
    }
    else{
      var proximaFoto = fotoAtual - 1;
    }
    
  }
  else if(escolha == 'proxima'){
    if(fotoAtual == totalFotos){
      var proximaFoto = 1;
    }
    else{
      var proximaFoto = fotoAtual + 1;
    }
    
  }

  var srcProximaFoto = elemento.parentNode.firstElementChild.children[(proximaFoto)-1].src;

  fotoMostrada.src=srcProximaFoto;

  elemento.parentNode.children[1].valueAsNumber = proximaFoto;
  
}