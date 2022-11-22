let jsiduser = document.querySelector('.jsiduser');
let btnnao = document.querySelector('.btnnao');

if(jsiduser.value >= 1){
    let modaluser = document.querySelector('.modaluser-container');
       modaluser.style.display = 'flex';
   }
   
let userFechar = document.querySelector('.userbtnfechar');

userFechar.addEventListener('click',()=>{
    let modaluser = document.querySelector('.modaluser-container');
    modaluser.style.display = 'none';
})

btnnao.addEventListener('click',()=>{
    let modaluser = document.querySelector('.modaluser-container');
    modaluser.style.display = 'none';
})