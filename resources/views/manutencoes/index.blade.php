@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-weight: 700">
                    Manutenções do Veículo
                </div>
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
                            data-bs-toggle="modal" data-bs-target="#newManutencaoModal"
                            style="float: right">
                        Nova Manutenção
                    </button>
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
                    @foreach ($data as $manutencao)
                        <tr>
                            <td>{{ $manutencao['descricao'] }}</td>
                            <td>R$ {{ $manutencao['valor'] }}</td>
                            <td>{{ date('d/m/Y'), strtotime($manutencao['data']) }}</td>
                            <td><a class="btn btn-sm btn-primary" href="{{ route('detalharManutencao', $manutencao['id']) }}">Detalhe</a></td>
                            <td><a class="btn btn-sm btn-danger" href="{{ route('deletarManutencao', $manutencao['id']) }}">Excluir</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('modal.manutencao')
@endsection
