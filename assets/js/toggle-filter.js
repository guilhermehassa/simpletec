var filterToggle = document.querySelector(".filter__toggle");

filterToggle.addEventListener("click",function(event){
    var filterCorpo = document.querySelector('.filter__corpo');

    var testeToggleFilter = filterCorpo.className;

    if(testeToggleFilter=='filter__corpo filter__corpo-hide'){
        filterCorpo.classList.remove('filter__corpo-hide');
        filterToggle.classList.remove('filter__toggle-hide');
    }else{
        filterCorpo.classList.add('filter__corpo-hide');
        filterToggle.classList.add('filter__toggle-hide');
    }
    



    

});