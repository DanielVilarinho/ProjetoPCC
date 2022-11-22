let jsid = document.querySelector('.jsid')
 
if(jsid.value >= 1){
 let modal = document.querySelector('.modal-container');
    modal.style.display = 'flex';
}



let fechar = document.querySelector('.btnfechar');

fechar.addEventListener('click',()=>{
    let modal = document.querySelector('.modal-container');
    modal.style.display = 'none';
})


