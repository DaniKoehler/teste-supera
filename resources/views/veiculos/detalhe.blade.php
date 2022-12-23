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
                <a class="btn btn-outline-primary" href="{{ route('listarVeiculos', Auth::user()->id) }}">
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
                @if (isset($data))
                    <table class="table table-responsive">
                        <tbody>
                        @foreach ($data as $veiculo)
                            <tr>
                                <td style="font-weight: 700">Placa</td>
                                <td>{{ $veiculo['placa'] }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Marca</td>
                                <td>{{ $veiculo['marca'] }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Modelo</td>
                                <td>{{ $veiculo['modelo'] }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Cor</td>
                                <td>{{ $veiculo['cor'] }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Versão</td>
                                <td>{{ $veiculo['versao'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>

@include('modal.editveiculo')
