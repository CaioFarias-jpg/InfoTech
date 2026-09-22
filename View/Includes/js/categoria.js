// ---------- Elementos do formulário de cliente ----------
const selectCategoriaCliente  = document.getElementById('id_categoria');
const btnNovaCategoriaCliente = document.getElementById('btn_nova_categoria');

// ---------- Elementos do modal de categoria ----------
const modalCategoriaCliente       = document.getElementById('modal_categoria_cliente');
const formCategoriaCliente        = document.getElementById('form_categoria_cliente');
const erroCategoriaCliente        = document.getElementById('categoria_cliente_erro');
const btnCancelarCategoriaCliente = document.getElementById('btn_cancelar_categoria_cliente');
const btnSalvarCategoriaCliente   = document.getElementById('btn_salvar_categoria_cliente');

// Busca as categorias na rota /categoria/listar (que chama o getAllRows)
// e monta as opções do select. idSelecionado = categoria que deve ficar marcada.
async function carregarCategorias(idSelecionado = '') {
    try {
        const response = await fetch('/infotech/categoria/listar?tipo=CLIENTE');
        const result = await response.json();

        if (result.status !== 200) {
            throw new Error(result.mensagem);
        }

        selectCategoriaCliente.innerHTML = ''; // limpa as opções antigas

        const placeholder = new Option(
            result.categorias.length > 0
                ? 'Selecione a categoria'
                : 'Nenhuma categoria cadastrada. Use + Categoria',
            ''
        );
        placeholder.disabled = true;
        selectCategoriaCliente.add(placeholder);

        result.categorias.forEach(categoria => {
            // new Option(texto, valor) evita montar HTML na mão
            selectCategoriaCliente.add(new Option(categoria.nome, categoria.id_categoria));
        });

        selectCategoriaCliente.value = idSelecionado;

        // se o id não existe no select, volta para o placeholder
        if (selectCategoriaCliente.selectedIndex === -1) {
            placeholder.selected = true;
        }
    } catch (error) {
        selectCategoriaCliente.innerHTML = '<option value="" disabled selected>Erro ao carregar categorias</option>';
        console.error(error);
    }
}

function mostrarErroCategoria(mensagem) {
    erroCategoriaCliente.textContent = mensagem;
    erroCategoriaCliente.hidden = false;
}

// Abre o modal limpo
btnNovaCategoriaCliente.addEventListener('click', () => {
    formCategoriaCliente.reset();
    erroCategoriaCliente.hidden = true;
    modalCategoriaCliente.showModal();
});

btnCancelarCategoriaCliente.addEventListener('click', () => {
    modalCategoriaCliente.close();
});

// Cadastra a categoria e atualiza o select
formCategoriaCliente.addEventListener('submit', async (event) => {
    event.preventDefault();
    erroCategoriaCliente.hidden = true;
    btnSalvarCategoriaCliente.disabled = true; // evita clique duplo

    try {
        // 1) POST na rota de cadastro de categoria
        const response = await fetch(formCategoriaCliente.action, {
            method: 'POST',
            body: new FormData(formCategoriaCliente)
        });
        const result = await response.json();

        if (result.status !== 200) {
            mostrarErroCategoria(result.mensagem);
            return;
        }

        // 2) recarrega o select (getAllRows) já marcando a categoria recém-criada
        await carregarCategorias(result.id_categoria);
        modalCategoriaCliente.close();
    } catch (error) {
        mostrarErroCategoria('Não foi possível falar com o servidor. Tente novamente.');
        console.error(error);
    } finally {
        btnSalvarCategoriaCliente.disabled = false;
    }
});

// Ao abrir a página: carrega as categorias (na edição, marca a do cliente)
carregarCategorias(selectCategoriaCliente.dataset.selecionado);
