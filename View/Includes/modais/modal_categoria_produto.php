<dialog id="modal_categoria_produto" class="modal-app">
    <form id="form_categoria_produto" action="/infotech/categoria/cadastro">
        <input type="hidden" name="tipo" value="PRODUTO">
        <h5 class="mb-3">Nova categoria de produto</h5>

        <div class="mb-3">
            <label for="categoria_produto_nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="categoria_produto_nome" name="nome"
                   maxlength="100" placeholder="Ex.: Limpeza" required>
        </div>

        <div class="mb-3">
            <label for="categoria_produto_descricao" class="form-label">Descrição (opcional)</label>
            <input type="text" class="form-control" id="categoria_produto_descricao" name="descricao" maxlength="255">
        </div>

        <p id="categoria_produto_erro" class="text-danger small" hidden></p>

        <div class="d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-outline-secondary" id="btn_cancelar_categoria_produto">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btn_salvar_categoria_produto">Salvar categoria</button>
        </div>
    </form>
</dialog>
