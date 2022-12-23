@include('layouts.app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-outline-primary" href="{{ route('home') }}">
                        Home
                    </a>
                    <a class="btn btn-outline-primary" href="{{ route('listarManutencoes', $data[0]['id_veiculo']) }}">
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
                @if (isset($data))
                    <table class="table table-responsive">
                        <tbody>
                        @foreach ($data as $manutencao)
                            <tr>
                                <td style="font-weight: 700">Descrição</td>
                                <td>{{ $manutencao['descricao'] }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Valor</td>
                                <td>R$ {{ $manutencao['valor'] }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Data</td>
                                <td>{{ date('d/m/Y'), strtotime($manutencao['data']) }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Veículo</td>
                                <td>{{ $manutencao['id_veiculo'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@include('modal.editmanutencao')
