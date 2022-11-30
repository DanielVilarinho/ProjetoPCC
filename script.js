let btnconfirmar = document.querySelector('#visuconfirmar')
let btnlog = document.querySelector('.fa-eye')


btnlog.addEventListener('click', ()=>{
  let inputsenhalog = document.querySelector('#senha')
  if(inputsenhalog.getAttribute('type') == 'password'){
    inputsenhalog.setAttribute('type', 'text')
  } else {
    inputsenhalog .setAttribute('type', 'password')
  }
})


btnconfirmar.addEventListener('click', ()=>{
  let inputconfirmarsenha = document.querySelector('#confirmarsenha')

  if(inputconfirmarsenha.getAttribute('type') == 'password'){
    inputconfirmarsenha.setAttribute('type', 'text')
  } else {
    inputconfirmarsenha.setAttribute('type', 'password')
  }
})

let nome = document.querySelector('#nome')
let labelnome = document.querySelector('#labelnome')
let validarnome = false

let email = document.querySelector('#email')
let labelemail = document.querySelector('#labelemail')
let validaremail = false

let telefone = document.querySelector('#telefone')
let labeltelefone = document.querySelector('#labeltelefone')
let validartelefone = false

let senha = document.querySelector('#senha')
let labelsenha = document.querySelector('#labelsenha')
let validarsenha = false

let confirmarsenha = document.querySelector('#confirmarsenha')
let labelconfirmarsenha = document.querySelector('#labelconfirmarsenha')
let validarconfirmarsenha  = false

let msgerro = document.querySelector('#msgerro')
let msgsucesso = document.querySelector('#msgsucesso')

function validEmail(email){
  let emailexp = /\S+@\S+\.\S+/
  return emailexp.test(email)
}




nome.addEventListener('keyup', () => {
  if(nome.value.length >= 10){
    labelnome.setAttribute('style', 'color: green')
    labelnome.innerHTML = 'Nome Completo'
    nome.setAttribute('style', 'border-color: green')
    validarnome = true
  } else {
    labelnome.setAttribute('style', 'color: red')
    labelnome.innerHTML = 'Nome Completo *Informe o nome completo'
    nome.setAttribute('style', 'border-color: red')
    validarnome = false
  }
})

email.addEventListener('keyup', () => {
  if(validEmail(email.value) !=true){
    labelemail.setAttribute('style', 'color: red')
    labelemail.innerHTML = 'Email *Informe um e-mail válido'
    email.setAttribute('style', 'border-color: red')
    validaremail = false
  } else {
    labelemail.setAttribute('style', 'color: green')
    labelemail.innerHTML = 'Email'
    email.setAttribute('style', 'border-color: green')
    validaremail = true
  }
})

/*function validtele(telefone){
  let telexp = /\s+@\S+\.\S+/
  return telexp.test(telefone);}*/

telefone.addEventListener('keyup', () => {
  if(telefone.value.length <=10 ){
    labeltelefone.innerHTML = 'Telefone *Informe os 11 digitos do seu telefone'
    labeltelefone.setAttribute('style', 'color: red')
    telefone.setAttribute('style', 'border-color: red')
    validartelefone = false
  } else {
    labeltelefone.innerHTML = 'Telefone'
    labeltelefone.setAttribute('style', 'color: green')
    telefone.setAttribute('style', 'border-color: green')
    validartelefone = true
  }
})





senha.addEventListener('keyup', () => {
  if(senha.value.length <= 7){
    labelsenha.setAttribute('style', 'color: red')
    labelsenha.innerHTML = 'Senha *Insira no minimo 8 caracteres'
    senha.setAttribute('style', 'border-color: red')
    validarsenha = false
  } else {
    labelsenha.setAttribute('style', 'color: green')
    labelsenha.innerHTML = 'Senha'
    senha.setAttribute('style', 'border-color: green')
    validarsenha = true
  }
})


confirmarsenha.addEventListener('keyup', () => {
  if(senha.value != confirmarsenha.value){
    labelconfirmarsenha.setAttribute('style', 'color: red')
    labelconfirmarsenha.innerHTML = 'Confirmar Senha *Senhas diferentes'
    confirmarsenha.setAttribute('style', 'border-color: red')
    validarconfirmarsenha = false
  } else {
    labelconfirmarsenha.setAttribute('style', 'color: green')
    labelconfirmarsenha.innerHTML = 'Confirmar Senha'
    confirmarsenha.setAttribute('style', 'border-color: green')
    validarconfirmarsenha = true
  }
})

function cadvalid(){
  if(validarnome && validaremail && validartelefone && validarsenha && validarconfirmarsenha){
    msgerro.setAttribute('style', 'display: none')
    msgsucesso.setAttribute('style', 'display: block')
    msgsucesso.innerHTML = 'Cadastro realizado com sucesso'
  } else{
    msgsucesso.setAttribute('style', 'display: none')
    msgerro.setAttribute('style', 'display: block')
    msgerro.innerHTML = 'Favor preencher todos os campos corretamente'
  }



}

