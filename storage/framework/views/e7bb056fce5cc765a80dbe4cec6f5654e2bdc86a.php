<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="font-weight: 700">Seus Veículos</div>
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
                                data-bs-toggle="modal" data-bs-target="#newVeiculoModal"
                                style="float: right">
                            Novo Veículo
                        </button>
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
                                <td>ID</td>
                                <th>Placa</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Cor</th>
                                <th>Ano</th>
                                <th>Manutenções</th>
                                <th>Detalhes</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $veiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($veiculo['id']); ?></td>
                                    <td><?php echo e($veiculo['placa']); ?></td>
                                    <td><?php echo e($veiculo['modelo']); ?></td>
                                    <td><?php echo e($veiculo['marca']); ?></td>
                                    <td><?php echo e($veiculo['cor']); ?></td>
                                    <td><?php echo e($veiculo['versao']); ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="<?php echo e(route('listarManutencoes', $veiculo['id'])); ?>">Ver</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="<?php echo e(route('detalharVeiculo', $veiculo['id'])); ?>">Detalhe</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" href="<?php echo e(route('deletarVeiculo', $veiculo['id'])); ?>">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php echo $__env->make('modal.veiculo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/veiculos/index.blade.php ENDPATH**/ ?>