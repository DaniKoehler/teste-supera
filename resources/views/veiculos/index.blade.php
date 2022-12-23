@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="font-weight: 700">Seus Veículos</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a class="btn btn-outline-primary" href="{{ route('home') }}">
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
                            @foreach ($data as $veiculo)
                                <tr>
                                    <td>{{ $veiculo['id'] }}</td>
                                    <td>{{ $veiculo['placa'] }}</td>
                                    <td>{{ $veiculo['modelo'] }}</td>
                                    <td>{{ $veiculo['marca'] }}</td>
                                    <td>{{ $veiculo['cor'] }}</td>
                                    <td>{{ $veiculo['versao'] }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('listarManutencoes', $veiculo['id']) }}">Ver</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('detalharVeiculo', $veiculo['id']) }}">Detalhe</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" href="{{ route('deletarVeiculo', $veiculo['id']) }}">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@include('modal.veiculo')
@endsection
