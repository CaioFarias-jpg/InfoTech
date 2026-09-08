let nome = document.getElementById('nome');

nome.addEventListener('change', async function(event){
    event.preventDefault();
    
    try {
        const response = await fetch('/infotech/API/action_cadastro_cliente.php');
        const result = await response.json();

        if(result.status == 200){
            alert("Deu certo a comunicação com a API via PHP");
        }
    }
    catch(error){
        alert('ERROOOOOOO');
    }
});