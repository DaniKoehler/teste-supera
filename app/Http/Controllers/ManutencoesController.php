<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use App\Models\Veiculo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class ManutencoesController extends Controller
{
    /**
     * Função para criar uma nova manutenção
     * @param Request $request
     * @param int $idVeiculo
     */
    public function criarManutencao(Request $request, int $idVeiculo)
    {
        $manutencao = new Manutencao();

        $descricao = $request->descricao;
        $valor = $request->valor;
        $data = $request->data;

        try {
            $manutencao->descricao = $descricao;
            $manutencao->valor = $valor;
            $manutencao->data = $data;
            $manutencao->id_veiculo = $idVeiculo;

            $manutencao->save();

            return redirect()->route('listarManutencoes', [
                'data' => $manutencao,
                'idVeiculo' => $idVeiculo,
                'sucesso' => true
            ]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Função para listar todas as manutenções de um veículo
     * @param int $idVeiculo
     */
    public function listarManutencoes(int $idVeiculo)
    {
        $manutencoes = Manutencao::where('id_veiculo', $idVeiculo)->get();

        $idUser = Veiculo::where('id', $idVeiculo)->first();

        $informacoes = array();
        foreach ($manutencoes as $manutencao) {
            $informacao['id'] = $manutencao->id;
            $informacao['descricao'] = $manutencao->descricao;
            $informacao['valor'] = $manutencao->valor;
            $informacao['data'] = $manutencao->data;
            $informacao['id_veiculo'] = $manutencao->id_veiculo;

            $informacoes[] = $informacao;
        }

        return view('manutencoes.index', [
            'idUser' => $idUser,
            'data' => $informacoes,
            'idVeiculo' => $idVeiculo
        ]);
    }

    /**
     * Função para editar uma manutenção
     * @param Request $request
     * @param int $idManutencao
     */
    public function editarManutencao(Request $request, int $idManutencao)
    {
        $manutencao = Manutencao::where('id', $idManutencao)->first();

        $idVeiculo = $manutencao->id_veiculo;

        $descricao = $request->descricao;
        $valor = $request->valor;
        $data = $request->data;

        try {
            $manutencao->descricao = $descricao;
            $manutencao->valor = $valor;
            $manutencao->data = $data;

            $manutencao->save();

            return redirect()->route('listarManutencoes', [
                'idVeiculo' => $idVeiculo,
                'idManutencao' => $idManutencao,
                'sucesso' => true
            ]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Função para deletar uma manutenção
     * @param int $idManutencao
     */
    public function deletarManutencao(int $idManutencao)
    {
        $manutencao = Manutencao::where('id', $idManutencao)->first();

        $idVeiculo = $manutencao->id_veiculo;

        try {
            $manutencao->delete();

            return redirect()->route('listarManutencoes', [
                'idManutencao' => $idManutencao,
                'idVeiculo' => $idVeiculo,
                'sucesso' => true
            ]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Função para detalhar uma manutenção
     * @param int $idManutencao
     */
    public function detalharManutencao(int $idManutencao)
    {
        $manutencao = Manutencao::where('id', $idManutencao)->first();

        $informacoes = array();

        $informacao['id'] = $manutencao->id;
        $informacao['descricao'] = $manutencao->descricao;
        $informacao['valor'] = $manutencao->valor;
        $informacao['data'] = $manutencao->data;
        $informacao['id_veiculo'] = $manutencao->id_veiculo;

        $informacoes[] = $informacao;

        return view('manutencoes.detalhe', [
            'data' => $informacoes
        ]);
    }

    /**
     * Api para listar todas as manutenções de um usuário
     * @param int $idUser
     */
    public function listarManutencoesJson(int $idUser): JsonResponse
    {
        $manutencoes = Manutencao::join('veiculos','id_veiculo','=','veiculos.id')
                        ->join('users','veiculos.id_user','=','users.id')
                        ->where('users.id','=', $idUser)
                        ->orderBy('manutencoes.data', 'desc')
                        ->limit(7)
                        ->get();

        return response()->json($manutencoes);
    }
}
