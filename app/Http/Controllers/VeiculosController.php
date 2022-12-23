<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Exception;

class VeiculosController extends Controller
{
    /**
     * Função para criar um novo veículo
     * @param Request $request
     * @param int $idUser
     */
    public function criarVeiculo(Request $request, int $idUser)
    {
        $veiculo = new Veiculo();

        $placa = $request->placa;
        $marca = $request->marca;
        $modelo = $request->modelo;
        $cor = $request->cor;
        $versao = $request->versao;

        try {
            $veiculo->placa = $placa;
            $veiculo->marca = $marca;
            $veiculo->modelo = $modelo;
            $veiculo->cor = $cor;
            $veiculo->versao = $versao;
            $veiculo->id_user = $idUser;

            $veiculo->save();

            return redirect()->route('listarVeiculos', [
                'idUser' => $idUser,
                'sucesso' => true
            ]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Função para listar todos os veiculos de um usuário
     * @param int $idUser
     */
    public function listarVeiculos(int $idUser)
    {
        $veiculos = Veiculo::where('id_user', $idUser);

        $veiculos = $veiculos->get();
        $informacoes = array();

        foreach ($veiculos as $veiculo) {
            $informacao['id'] = $veiculo->id;
            $informacao['placa'] = $veiculo->placa;
            $informacao['marca'] = $veiculo->marca;
            $informacao['modelo'] = $veiculo->modelo;
            $informacao['cor'] = $veiculo->cor;
            $informacao['versao'] = $veiculo->versao;
            $informacao['id_user'] = $veiculo->id_user;

            $informacoes[] = $informacao;
        }

        return view('veiculos.index', [
            'data' => $informacoes,
            'idUser' => $idUser
        ]);
    }

    /**
     * Função para editar um veículo
     * @param Request $request
     * @param int $idVeiculo
     */
    public function editarVeiculo(Request $request, int $idVeiculo)
    {
        $veiculos = Veiculo::where('id', $idVeiculo)->first();

        $placa = $request->placa;
        $marca = $request->marca;
        $modelo = $request->modelo;
        $cor = $request->cor;
        $versao = $request->versao;

        $idUser = $veiculos->id_user;

        try {
            $veiculos->placa = $placa;
            $veiculos->marca = $marca;
            $veiculos->modelo = $modelo;
            $veiculos->cor = $cor;
            $veiculos->versao = $versao;
            $veiculos->save();


            return redirect()->route('listarVeiculos', [
                'data' => $veiculos,
                'idUser' => $idUser,
                'idVeiculo' => $idVeiculo,
                'sucesso' => true
            ]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Função para deletar um veículo
     * @param int $idVeiculo
     */
    public function deletarVeiculo(int $idVeiculo)
    {
        $veiculos = Veiculo::where('id', $idVeiculo)->first();

        $idUser = $veiculos->id_user;

        try {
            $veiculos->delete();

            return redirect()->route('listarVeiculos', [
                'idVeiculo' => $idVeiculo,
                'idUser' => $idUser,
                'sucesso' => true
            ]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Função para detalhar um veículo
     * @param int $idVeiculo
     */
    public function detalharVeiculo(int $idVeiculo)
    {
        $veiculos = Veiculo::where('id', $idVeiculo)->first();

        $informacoes = array();

        $informacao['id'] = $veiculos->id;
        $informacao['placa'] = $veiculos->placa;
        $informacao['marca'] = $veiculos->marca;
        $informacao['modelo'] = $veiculos->modelo;
        $informacao['cor'] = $veiculos->cor;
        $informacao['versao'] = $veiculos->versao;
        $informacao['id_user'] = $veiculos->id_user;

        $informacoes[] = $informacao;

        return view('veiculos.detalhe', [
            'data' => $informacoes
        ]);
    }
}
