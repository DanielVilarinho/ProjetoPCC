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
