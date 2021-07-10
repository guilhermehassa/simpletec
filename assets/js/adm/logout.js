logoutBtn=document.querySelector('#logout');


logoutBtn.addEventListener('click',function(){
  fechaMostra.classList.add('invisivel');
  tituloForm.classList.add('invisivel');
  objetivoForm.textContent='logout';
  
  acionaMostra();

  mostrarForm('logout','realmente sair do sistema?');
});