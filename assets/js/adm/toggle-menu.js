var menuToggle = document.querySelector('.menu__toggle');
var menu = document.querySelector('.menu');

function abrirMenu(){
  menuToggle.classList.add('menu__toggle-on');
  menu.classList.add('menu-on');
}

function fecharMenu(){
  menuToggle.classList.remove('menu__toggle-on');
  menu.classList.remove('menu-on');
}

menuToggle.addEventListener('click',function(){
  if(menu.classList == 'menu menu-on'){
    fecharMenu();
  }
  else{
    abrirMenu();
  }
})