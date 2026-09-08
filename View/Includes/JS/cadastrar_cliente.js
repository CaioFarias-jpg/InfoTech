const modal = document.getElementById("modal");

console.log(modal);

function chamaModal(){
    modal.classList.remove('oculta');
    modal.classList.add('chama');
}

let nome = document.getElementById('nome');

nome.addEventListener('change', async function(event){
    event.preventDefault();
    
    try {
        const response = await fetch('/infotech/API/action_cadastro_cliente.php');
        const result = await response.json();

        if(result.status == 200){
                chamaModal();        
        }else{
            alert("Não chama nada");
        }
    }
    catch(error){
        alert(resposta);
    }
});