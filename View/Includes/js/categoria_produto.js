// ---------- Elementos do formulário de cliente ----------
const selectCategoriaProduto  = document.getElementById('id_categoria');
const btnNovaCategoriaProduto = document.getElementById('btn_nova_categoria');

// ---------- Elementos do modal de categoria ----------
const modalCategoriaProduto       = document.getElementById('modal_categoria_produto');
const formCategoriaProduto        = document.getElementById('form_categoria_produto');
const erroCategoriaProduto        = document.getElementById('categoria_produto_erro');
const btnCancelarCategoriaProduto = document.getElementById('btn_cancelar_categoria_produto');
const btnSalvarCategoriaProduto   = document.getElementById('btn_salvar_categoria_produto');

// Busca as categorias na rota /categoria/listar (que chama o getAllRows)
// e monta as opções do select. idSelecionado = categoria que deve ficar marcada.
async function carregarCategorias(idSelecionado = '') {
    try {
        const response = await fetch('/infotech/categoria/listar?tipo=PRODUTO');
        const result = await response.json();

        if (result.status !== 200) {
            throw new Error(result.mensagem);
        }

        selectCategoriaProduto.innerHTML = ''; // limpa as opções antigas

        const placeholder = new Option(
            result.categorias.length > 0
                ? 'Selecione a categoria'
                : 'Nenhuma categoria cadastrada. Use + Categoria',
            ''
        );
        placeholder.disabled = true;
        selectCategoriaProduto.add(placeholder);

        result.categorias.forEach(categoria => {
            // new Option(texto, valor) evita montar HTML na mão
            selectCategoriaProduto.add(new Option(categoria.nome, categoria.id_categoria));
        });

        selectCategoriaProduto.value = idSelecionado;

        // se o id não existe no select, volta para o placeholder
        if (selectCategoriaProduto.selectedIndex === -1) {
            placeholder.selected = true;
        }
    } catch (error) {
        selectCategoriaProduto.innerHTML = '<option value="" disabled selected>Erro ao carregar categorias</option>';
        console.error(error);
    }
}

function mostrarErroCategoria(mensagem) {
    erroCategoriaProduto.textContent = mensagem;
    erroCategoriaProduto.hidden = false;
}

// Abre o modal limpo
btnNovaCategoriaProduto.addEventListener('click', () => {
    formCategoriaProduto.reset();
    erroCategoriaProduto.hidden = true;
    modalCategoriaProduto.showModal();
});

btnCancelarCategoriaProduto.addEventListener('click', () => {
    modalCategoriaProduto.close();
});

// Cadastra a categoria e atualiza o select
formCategoriaProduto.addEventListener('submit', async (event) => {
    event.preventDefault();
    erroCategoriaProduto.hidden = true;
    btnSalvarCategoriaProduto.disabled = true; // evita clique duplo

    try {
        // 1) POST na rota de cadastro de categoria
        const response = await fetch(formCategoriaProduto.action, {
            method: 'POST',
            body: new FormData(formCategoriaProduto)
        });
        const result = await response.json();

        if (result.status !== 200) {
            mostrarErroCategoria(result.mensagem);
            return;
        }

        // 2) recarrega o select (getAllRows) já marcando a categoria recém-criada
        await carregarCategorias(result.id_categoria);
        modalCategoriaProduto.close();
    } catch (error) {
        mostrarErroCategoria('Não foi possível falar com o servidor. Tente novamente.');
        console.error(error);
    } finally {
        btnSalvarCategoriaProduto.disabled = false;
    }
});

// Ao abrir a página: carrega as categorias (na edição, marca a do cliente)
carregarCategorias(selectCategoriaProduto.dataset.selecionado);
