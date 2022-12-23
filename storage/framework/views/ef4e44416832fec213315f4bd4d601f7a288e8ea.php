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
            <div class="card-header" style="font-weight: 700">
                Informações do Veículo
                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                        data-bs-target="#editVeiculoModal" style="float: right">
                    Editar
                </button>
            </div>
                <?php if(isset($data)): ?>
                    <table class="table table-responsive">
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $veiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="font-weight: 700">Placa</td>
                                <td><?php echo e($veiculo['placa']); ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Marca</td>
                                <td><?php echo e($veiculo['marca']); ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Modelo</td>
                                <td><?php echo e($veiculo['modelo']); ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Cor</td>
                                <td><?php echo e($veiculo['cor']); ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Versão</td>
                                <td><?php echo e($veiculo['versao']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('modal.editveiculo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/resources/views/veiculos/detalhe.blade.php ENDPATH**/ ?>