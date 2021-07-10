

function enviarWhatsapp(){
  var destinatario = "5513981447414";
  var nome = document.querySelector('#nome').value;
  var email = document.querySelector('#email').value;
  var telefone = document.querySelector('#telefone').value;
  
  var mensagem = document.querySelector('#mensagem').value;

  if(nome=='' || email=='' || telefone==''){
    alert("Preencha todas as informações do formulário")
  }
  else{

    
    var texto = "Contato de *"+nome+"*\nemail: "+email+" - Telefone: "+telefone+"\n\n"+mensagem;
    texto = window.encodeURIComponent(texto);
    
    window.open("https://api.whatsapp.com/send?phone=" + destinatario + "&text=" + texto, "_blank");
    //Obs.. use "_system", no lugar de blank, caso você esteja usando Phonegap / Cordova / Ionic ou qualquer um baseado em webview;
  }


  }