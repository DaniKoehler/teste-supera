<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-weight: 700">
                    Manutenções do Veículo
                </div>
                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <a class="btn btn-outline-primary" href="<?php echo e(route('home')); ?>">
                        Home
                    </a>
                    <button type="button" class="btn btn-outline-success"
                            data-bs-toggle="modal" data-bs-target="#newManutencaoModal"
                            style="float: right">
                        Nova Manutenção
                    </button>
                    <a class="btn btn-outline-primary" href="<?php echo e(route('listarVeiculos', Auth::user()->id)); ?>">
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
                <table class="table table-hover table-responsive" style="text-align: center">
                    <thead class="table-light">
                        <tr>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Data</th>
                            <th>Detalhe</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manutencao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($manutencao['descricao']); ?></td>
                            <td>R$ <?php echo e($manutencao['valor']); ?></td>
                            <td><?php echo e(date('d/m/Y'), strtotime($manutencao['data'])); ?></td>
                            <td><a class="btn btn-sm btn-primary" href="<?php echo e(route('detalharManutencao', $manutencao['id'])); ?>">Detalhe</a></td>
                            <td><a class="btn btn-sm btn-danger" href="<?php echo e(route('deletarManutencao', $manutencao['id'])); ?>">Excluir</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('modal.manutencao', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/manutencoes/index.blade.php ENDPATH**/ ?>