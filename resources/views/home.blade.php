@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-weight: 700">Suas próximas manutenções</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-outline-primary" href="{{ route('listarVeiculos', Auth::user()->id) }}">
                        Seus Veículos
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table id="table" class="table table-hover">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">Descrição</th>
                            <th scope="col">Modelo do Veículo</th>
                            <th scope="col">Placa do Veículo</th>
                            <th scope="col">Valor da Manutenção</th>
                            <th scope="col">Data da Manutenção</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            async function getManutencoes() {
                try {
                    const response = fetch('http://localhost:8888/api/manutencoes/{{ Auth::user()->id }}')
                    const data = await (await response).json()

                    setManutencoes(data)
                } catch (error) {
                    console.error(error)
                }
            }
                getManutencoes()

            function formatDate(str)
            {
                return str.split('-').reverse().join('/');
            }

            function setManutencoes(manutencoes) {
                let tbody = document.getElementById('tbody')

                for (let manutencao of manutencoes) {
                    let tr = tbody.insertRow();
                    let tdDescricao = tr.insertCell();
                    let tdModelo = tr.insertCell();
                    let tdPlaca = tr.insertCell();
                    let tdValor = tr.insertCell();
                    let tdData = tr.insertCell();

                    tdDescricao.innerText = manutencao.descricao
                    tdModelo.innerText = manutencao.modelo
                    tdPlaca.innerText = manutencao.placa
                    tdValor.innerText = manutencao.valor
                    tdData.innerText = formatDate(manutencao.data)
                }

                document.querySelector('main').innerHTML = output
            }
        </script>
    </div>
</div>
@endsection
