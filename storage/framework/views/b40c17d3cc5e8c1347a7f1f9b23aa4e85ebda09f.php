<div class="modal fade" id="editManutencaoModal" tabindex="-1" aria-labelledby="editManutencaoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Manutenção</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('editarManutencao', $data[0]['id'])); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label for="descManutencao" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="descManutencao" name="descricao"
                               aria-describedby="descricaoHelp" value="<?php echo e($data[0]['descricao']); ?>" required>
                        <div id="descricaoHelp" class="form-text">Descrição</div>
                    </div>
                    <div class="mb-3">
                        <label for="valorManutencao" class="form-label">Valor</label>
                        <input type="number" step="0.01" class="form-control" id="valorManutencao" name="valor"
                               aria-describedby="valorHelp" value="<?php echo e($data[0]['valor']); ?>" required>
                        <div id="valorHelp" class="form-text">Valor</div>
                    </div>
                    <div class="mb-3">
                        <label for="dataManutencao" class="form-label">Data</label>
                        <input type="date" class="form-control" id="dataManutencao" name="data"
                               aria-describedby="dataHelp" value="<?php echo e(date('d/m/Y'), strtotime($data[0]['data'])); ?>" required>
                        <div id="dataHelp" class="form-text">Data</div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right;">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/resources/views/modal/editmanutencao.blade.php ENDPATH**/ ?>