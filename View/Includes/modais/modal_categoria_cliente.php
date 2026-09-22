<dialog id="modal_categoria_cliente" class="modal-app">
    <form id="form_categoria_cliente" action="/infotech/categoria/cadastro">
        <input type="hidden" name="tipo" value="CLIENTE">
        <h5 class="mb-3">Nova categoria de cliente</h5>

        <div class="mb-3">
            <label for="categoria_cliente_nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="categoria_cliente_nome" name="nome"
                   maxlength="100" placeholder="Ex.: Premium" required>
        </div>

        <div class="mb-3">
            <label for="categoria_cliente_descricao" class="form-label">Descrição (opcional)</label>
            <input type="text" class="form-control" id="categoria_cliente_descricao" name="descricao" maxlength="255">
        </div>

        <p id="categoria_cliente_erro" class="text-danger small" hidden></p>

        <div class="d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-outline-secondary" id="btn_cancelar_categoria_cliente">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btn_salvar_categoria_cliente">Salvar categoria</button>
        </div>
    </form>
</dialog>
