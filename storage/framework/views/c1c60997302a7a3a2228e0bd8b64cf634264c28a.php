<div class="modal fade" id="editVeiculoModal" tabindex="-1" aria-labelledby="editVeiculoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Veículo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('editarVeiculo', $data[0]['id'])); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label for="placaVeiculo" class="form-label">Placa</label>
                        <input type="text" class="form-control" id="placaVeiculo" name="placa"
                               aria-describedby="placaHelp" value="<?php echo e($data[0]['placa']); ?>" required>
                        <div id="placaHelp" class="form-text">Placa</div>
                    </div>
                    <div class="mb-3">
                        <label for="marcaVeiculo" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marcaVeiculo" name="marca"
                               aria-describedby="marcaHelp" value="<?php echo e($data[0]['marca']); ?>" required>
                        <div id="marcaHelp" class="form-text">Marca</div>
                    </div>
                    <div class="mb-3">
                        <label for="modeloVeiculo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="modeloVeiculo" name="modelo"
                               aria-describedby="modeloHelp" value="<?php echo e($data[0]['modelo']); ?>" required>
                        <div id="modeloHelp" class="form-text">Modelo</div>
                    </div>
                    <div class="mb-3">
                        <label for="corVeiculo" class="form-label">Cor</label>
                        <input type="text" class="form-control" id="corVeiculo" name="cor"
                               aria-describedby="corHelp" value="<?php echo e($data[0]['cor']); ?>" required>
                        <div id="corHelp" class="form-text">Cor</div>
                    </div>
                    <div class="mb-3">
                        <label for="versaoVeiculo" class="form-label">Versão</label>
                        <input type="text" class="form-control" id="versaoVeiculo" name="versao"
                               aria-describedby="versaoHelp" value="<?php echo e($data[0]['versao']); ?>" required>
                        <div id="versaoHelp" class="form-text">Versão</div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right;">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/resources/views/modal/editveiculo.blade.php ENDPATH**/ ?>