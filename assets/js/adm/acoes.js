function acaoDoMenu(){
  var pagina = tituloOficial;
  var acao = mostra.querySelector('#acao-formulario').textContent;
  var objetivo = objetivoForm.textContent;
	var objeto = mostra.querySelector('#cod-objeto-formulario').textContent;
	var nomeObjeto = mostra.querySelector('#objeto-formulario').textContent;
	var valor = mostra.querySelector('#valor-formulario').textContent;

  if(objetivo=='logout'){
    window.location='actions/logout.php';
  }
  else{
    var mensagem = acao+' do(a) '+pagina+' "'+nomeObjeto+'" efetuada com sucesso!';

    var ajax = new XMLHttpRequest();
    // Seta tipo de requisição e URL com os parâmetros
    ajax.open("GET", "actions/"+pagina+"-"+acao+".php?objeto="+objeto+'&valor='+valor, true);
  
    // Envia a requisição
    ajax.send();
  
    // Cria um evento para receber o retorno.
    ajax.onreadystatechange = function() {
      // Caso o state seja 4 e o http.status for 200, é porque a requisiçõe deu certo.
      if (ajax.readyState == 4 && ajax.status == 200) {
        var retorno = ajax.responseText;
        if(retorno == 'ok'){
          alert(mensagem);
          
          window.location=pagina+".php";
        }
        else{
          console.log(retorno);
        }
      }
      
    }
  }
  

  
  

}