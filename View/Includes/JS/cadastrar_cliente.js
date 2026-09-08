let nome = document.getElementById('nome');

nome.addEventListener('change', function(event){
    event.preventDefault();
    alert(nome.value);
});