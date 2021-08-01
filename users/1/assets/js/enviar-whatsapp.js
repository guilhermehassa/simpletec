var destinatario = "5513997671326";

function enviarWhatsapp(produto){
  
  var nomeProduto = produto.querySelector('.produto__titulo').textContent;
  var codProduto = produto.querySelector('.produto__cod').textContent;

  var mensagem = 'Gostaria de orçamento do produto\n'+codProduto+'\n*'+nomeProduto+'*';


  var texto = "Contato via Catálogo\n\n"+mensagem;
  texto = window.encodeURIComponent(texto);
  
  window.open("https://api.whatsapp.com/send?phone=" + destinatario + "&text=" + texto, "_blank");
	//Obs.. use "_system", no lugar de blank, caso você esteja usando Phonegap / Cordova / Ionic ou qualquer um baseado em webview;
}

var produtos = document.querySelectorAll('.produto');

produtos.forEach(produto =>{
  var botaoWhats = produto.querySelector('.icon__whats');

  botaoWhats.addEventListener('click',function(){
    enviarWhatsapp(produto);
  });
});

