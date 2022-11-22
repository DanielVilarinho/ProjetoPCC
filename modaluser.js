let jsiduser = document.querySelector('.jsiduser');
let btnnao = document.querySelector('.btnnao');

if(jsiduser.value >= 1){
    let modal = document.querySelector('.modaluser-container');
       modal.style.display = 'flex';
   }
   
let fechar = document.querySelector('.userbtnfechar');

fechar.addEventListener('click',()=>{
    let modal = document.querySelector('.modaluser-container');
    modal.style.display = 'none';
})

btnnao.addEventListener('click',()=>{
    let modal = document.querySelector('.modaluser-container');
    modal.style.display = 'none';
})