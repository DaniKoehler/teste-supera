<div class="modal fade" id="newManutencaoModal" tabindex="-1" aria-labelledby="newManutencaoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Manutenção</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input hidden>
                <form method="POST" action="{{ route('criarManutencao', $idVeiculo) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="descricaoManutencao" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="descricaoManutencao" name="descricao"
                               aria-describedby="descricaoHelp" required>
                        <div id="descricaoHelp" class="form-text">Descrição</div>
                    </div>
                    <div class="mb-3">
                        <label for="valorManutencao" class="form-label">Valor</label>
                        <input type="number" step="0.01" class="form-control" id="valorManutencao" name="valor"
                               aria-describedby="valorHelp" required>
                        <div id="valorHelp" class="form-text">Valor</div>
                    </div>
                    <div class="mb-3">
                        <label for="dataManutencao" class="form-label">Data</label>
                        <input type="date" class="form-control" id="dataManutencao" name="data"
                               aria-describedby="dataHelp" required>
                        <div id="dataHelp" class="form-text">Data</div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right;">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
