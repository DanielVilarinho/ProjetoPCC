let btn = document.querySelector('#visusenha')
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


let nome = document.querySelector('#nome')
let labelnome = document.querySelector('#labelnome')
let validarnome = false

let email = document.querySelector('#email')
let labelemail = document.querySelector('#labelemail')
let validaremail = false

let telefone = document.querySelector('#telefone')
let labeltelefone = document.querySelector('#telefone')
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
  if(nome.value.length <= 0){
    validarnome = false
  } else {
    validarnome = true
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

telefone.addEventListener('keyup', () => {
  if(nome.value.length <= 0){
    validartelefone = false
  } else {
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

function cadastrar(){
  if(validarnome && validaremail && validartelefone && validarconfirmarsenha && validarconfirmarsenha){
    msgerro.setAttribute('style', 'display: none')
    msgsucesso.setAttribute('style', 'display: block')
    msgsucesso.innerHTML = 'Cadastro realizado com sucesso'
  } else{
    msgsucesso.setAttribute('style', 'display: none')
    msgerro.setAttribute('style', 'display: block')
    msgerro.innerHTML = 'Favor preencher todos os campos corretamente'
  }



}

btn.addEventListener('click', ()=>{
  let inputsenha = document.querySelector('#senha')

  if(inputsenha.getAttribute('type') == 'password'){
    inputsenha.setAttribute('type', 'text')
  } else {
    inputsenha.setAttribute('type', 'password')
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

