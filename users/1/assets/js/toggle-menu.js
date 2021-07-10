var toggleMenu = document.querySelector('.header__toggle');
var nav = document.querySelector('.nav');

toggleMenu.addEventListener('click',function(event){
  var navAtual = nav.className;

  if(navAtual=='nav nav-on'){
    nav.classList.remove('nav-on');
    toggleMenu.classList.remove('header__toggle-on');
  }else{
    nav.classList.add('nav-on');
    toggleMenu.classList.add('header__toggle-on');
  }
})