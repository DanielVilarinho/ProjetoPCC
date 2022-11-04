let btn = document.querySelector('#visusenha')
let btnconfirmar = document.querySelector('#visuconfirmar')

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

nome.addEventListener('keyup', () => {
  if(nome.value.length <= 0){
    validarnome = false
  } else {
    validarnome = true
  }
})

email.addEventListener('keyup', () => {
  if(email.value.length <= 0){
    validaremail = false
  } else {
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
    labelsenha.innerHTML = 'Senha *Insira uma senha com no minimo 8 caracteres'
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
    labelconfirmarsenha.innerHTML = 'Confirmar Senha *Senha diferente da infomada acima'
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

