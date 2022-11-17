let categoriaSelect = document.getElementById("categoria")   
 

categoriaSelect.onchange = () =>{
    let servicoSelect = document.getElementById("servico");
    let value = categoriaSelect.value
    fetch("select_servico.php?categoria=" + value)
    .then( resposta => {
        return resposta.text();
    })
    .then(conteudo => {
        servicoSelect.innerHTML = conteudo;
    });

}


function pad(valor) { 
    return valor.toString().padStart(2, '0');
}

function formata(data) {
    return `${data.getFullYear()}-${pad(data.getMonth() + 1)}-${pad(data.getDate())}`;
}

const campo = document.querySelector('#testerdata');

window.addEventListener('DOMContentLoaded', function() {
    var data = new Date();
    campo.min = formata(data);


    data.setFullYear(data.getFullYear() + 1);
    campo.max = formata(data);
    console.log(formata(data)); 

});








/*
campo.addEventListener('input', () => {
    campo.setCustomValidity('');
    campo.checkValidity();
  });
  
  
  campo.addEventListener('invalid', () => {
      campo.setCustomValidity('A data deve estar entre hoje e 2 anos à frente');
  });

  */