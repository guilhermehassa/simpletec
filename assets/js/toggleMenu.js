var header = document.querySelector('.header');
var toggleMenu = document.querySelector('.navToggle');
var nav = document.querySelector('.nav');

function acionaMenu(){
  header.classList.add('header-menuAtivo');
  toggleMenu.classList.add('navToggle-ativo');
  nav.classList.add('nav-ativo')
}

function fechaMenu(){
  header.classList.remove('header-menuAtivo');
  toggleMenu.classList.remove('navToggle-ativo');
  nav.classList.remove('nav-ativo')
}

toggleMenu.addEventListener('click',function(){

  if(toggleMenu.classList=='icon icon__down--blue navToggle'){
    acionaMenu();
  }
  else{
    fechaMenu();
  }
  
});