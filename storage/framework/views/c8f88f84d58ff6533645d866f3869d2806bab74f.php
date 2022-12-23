<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <a class="btn btn-outline-primary" href="<?php echo e(route('home')); ?>">
                        Home
                    </a>
                    <a class="btn btn-outline-primary" href="<?php echo e(route('listarManutencoes', $data[0]['id_veiculo'])); ?>">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-weight: 700">
                    Informações da Manutenção
                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#editManutencaoModal" style="float: right">
                        Editar
                    </button>
                </div>
                <?php if(isset($data)): ?>
                    <table class="table table-responsive">
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manutencao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="font-weight: 700">Descrição</td>
                                <td><?php echo e($manutencao['descricao']); ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Valor</td>
                                <td>R$ <?php echo e($manutencao['valor']); ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Data</td>
                                <td><?php echo e(date('d/m/Y'), strtotime($manutencao['data'])); ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Veículo</td>
                                <td><?php echo e($manutencao['id_veiculo']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('modal.editmanutencao', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/resources/views/manutencoes/detalhe.blade.php ENDPATH**/ ?>