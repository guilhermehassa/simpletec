function resetarMenusOpcoes(){
	var resetar=document.querySelectorAll('.opcoes-lista');
  resetar.forEach(function(resetar){
    resetar.classList.remove('opcoes-lista-ativo');
  });
}

function abrirMenuOpcoes(linha){
	if(linha.className != 'lista__corpo-tr'){
		var linha = linha.parentNode;
	}
	var opcoesLista = linha.querySelector('.opcoes-lista');
	opcoesLista.classList.add('opcoes-lista-ativo');
}

function acionaMostra(){
	mostra.classList.add('mostra-on');
}

function mostrarImagem(imgClicada){
	mostraImg.src=imgClicada;

	acionaMostra();
	mostraImg.classList.add('mostra__img-on')
}

function mostrarForm(valor,texto){
	mostraForm.classList.add('mostra__form-on');
	textoForm.textContent = texto;
	
}

function fecharMostra(){
	mostraImg.classList.remove('mostra__img-on');
  mostraForm.classList.remove('mostra__form-on');
  mostra.classList.remove('mostra-on');
	fechaMostra.classList.remove('invisivel');
}

function nomearObjeto(codObjeto,pagina){
	var ajax = new XMLHttpRequest();
	// Seta tipo de requisição e URL com os parâmetros
	ajax.open("GET", "request/nomeObjeto.php?pagina="+pagina+"&cod="+codObjeto, true);

	// Envia a requisição
	ajax.send();

	// Cria um evento para receber o retorno.
	ajax.onreadystatechange = function() {
		// Caso o state seja 4 e o http.status for 200, é porque a requisiçõe deu certo.
		if (ajax.readyState == 4 && ajax.status == 200) {
			var nomeObjeto = ajax.responseText;
			var objetoFormulario = mostra.querySelector('#objeto-formulario');
			var codObjetoFormulario = mostra.querySelector('#cod-objeto-formulario');
			var tituloForm = document.querySelector('.mostra__legend-objeto');
			objetoFormulario.textContent = nomeObjeto;
			codObjetoFormulario.textContent = codObjeto;
			tituloForm.textContent = nomeObjeto;
		}
		
	}

	
}

function reformularValoresForm(acao,valor){
	var acaoFormulario = mostra.querySelector('#acao-formulario');
	var valorFormulario = mostra.querySelector('#valor-formulario');

	acaoFormulario.textContent = acao;
	valorFormulario.textContent = valor;
}

function alteraStatus(objeto,valor,objetivoForm){
	if(valor=='A'){
		textoValor = 'ativo';
	}else if(valor=='D'){
		textoValor = 'desativado';
	}

	if(objetivoForm=='produtos'){
    textoObjetivo='do produto';
	}else if(objetivoForm=='categorias'){
    textoObjetivo = 'da categoria';
	}


	reformularValoresForm('status',valor);
	var nomeObjeto = mostra.querySelector('#objeto-formulario').textContent;
	
	var texto = 'alterar o status '+textoObjetivo+' '+nomeObjeto+' para '+textoValor+'?';

	mostrarForm(valor,texto);
}

function alteraDestaque(objeto,valor){
	if(valor=='A'){
		textoValor = 'seja';
	}else if(valor=='D'){
		textoValor = 'não seja';
	}

	reformularValoresForm('destaque',valor);
	var nomeObjeto = mostra.querySelector('#objeto-formulario').textContent;
	
	var texto = 'que o produto "'+nomeObjeto+'" '+textoValor+' um destaque?';
	
	mostrarForm(valor,texto);
}

function chamaAcao(itemClicado){
	fechaMostra.classList.add('invisivel');
	var menu = itemClicado.parentNode;
	var acao = menu.firstElementChild.textContent;
	var objeto = menu.children[1].textContent;
	var valor = itemClicado.firstElementChild.textContent;

	nomearObjeto(objeto,tituloOficial);
	acionaMostra();
	setTimeout(function() {
		if(acao == 'Status'){
			alteraStatus(objeto,valor,tituloOficial);
		}else if(acao=='Destaque'){
			alteraDestaque(objeto,valor,tituloOficial);
		}
	}, 1800)
	
}