var toggleOpcoesLista = document.querySelector('.lista__corpo-td-menu');

var corpoTabela = document.querySelector('.lista__corpo');

corpoTabela.addEventListener("click",function(event){

    var resetar=document.querySelectorAll('.opcoes-lista');
    resetar.forEach(function(resetar){
        resetar.classList.remove('opcoes-lista-ativo');
    });
    
    var linha = event.target.parentNode;
    var opcoesLista = linha.querySelector('.opcoes-lista');
    
    var testeToggleLista = opcoesLista.className;

    if(testeToggleLista == 'opcoes-lista opcoes-lista-ativo'){
        opcoesLista.classList.remove('opcoes-lista-ativo');
    }else{
        opcoesLista.classList.add('opcoes-lista-ativo');
    }


});