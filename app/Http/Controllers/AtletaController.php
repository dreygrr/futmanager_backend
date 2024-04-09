<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class AtletaController extends Controller
{
    function get (Request $request, string $id) {
        return Atleta::where('ativo', 1,)->with('categoria')->find($id);
    }

    function list (Request $request) {
        $perPage = $request->input('size', 10);
        $page = $request->input('page', 1);
        $atletas = Atleta::where('ativo', 1)::orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $page);

        $response = [
            'data' => $atletas->items(),
            'pagination' => [
                'current_page' => $atletas->currentPage(),
                'total_pages' => $atletas->lastPage(),
                'total_records' => $atletas->total(),
            ],
        ];

        return response()->json($response);
    }

    function sub (Request $request, string $id) {
        $perPage = $request->input('size', 10);
        $page = $request->input('page', 1);
        $atletas = Atleta::where('categoria_id', $id)->where('ativo', 1)->orderBy('numeroUniforme', 'asc')->paginate($perPage, ['*'], 'page', $page);

        $response = [
            'data' => $atletas->items(),
            'pagination' => [
                'current_page' => $atletas->currentPage(),
                'total_pages' => $atletas->lastPage(),
                'total_records' => $atletas->total(),
            ],
        ];

        return response()->json($response);
    }

    function chamadaSub (Request $request, string $id) {
        $atletas = Atleta::where('categoria_id', $id)
        ->where('ativo', 1,)
        ->orderBy('numeroUniforme', 'asc')
        ->get();

        return response()->json(['data' => $atletas]);
    }

    function create (Request $request) {
        if ($request->imagem) {
            $dadosImagem = $request->validate([
                'imagem' => 'required|string',
            ]);

            $imagemBase64 = $dadosImagem['imagem'];
        } else {
            $imagemBase64 = null;
        }

        $atleta = new Atleta();
        $atleta->nomeCompleto = $request->nomeCompleto;
        $atleta->apelido = $request->apelido;
        $atleta->dataNascimento = $request->dataNascimento;
        $atleta->idade = $request->idade;
        $atleta->genero = $request->genero;
        $atleta->posicao = $request->posicao;
        $atleta->cpf = $request->cpf;
        $atleta->rg = $request->rg;
        $atleta->peso = $request->peso;
        $atleta->altura = $request->altura;
        $atleta->nomeUniforme = $request->nomeUniforme;
        $atleta->numeroUniforme = $request->numeroUniforme;
        $atleta->tamanhoUniforme = $request->tamanhoUniforme;
        $atleta->numeroCalcado = $request->numeroCalcado;
        $atleta->caminhoImagem = $imagemBase64;
        $atleta->user_id = $request->user()->id;
        $atleta->categoria_id = $request->categoria_id;
        $atleta->ativo = true;
        $atleta->save();
        return $atleta->toJson();
    }

    function delete (Request $request, string $id) {
        $atleta = Atleta::find($id);
        if(!$atleta) {
            return response()->json(['message' => 'Atleta não encontrado'], 404);
        }
        try {
            $atleta->ativo = 0;
            $atleta->save();
            return response()->json(['message' => 'Atleta deletado com sucesso']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Falha em deletar o registro'], 500);
        }
    }

    function edit (Request $request, string $id) {
        if ($request->imagem) {
            $dadosImagem = $request->validate([
                'imagem' => 'required|string',
            ]);

            $imagemBase64 = $dadosImagem['imagem'];
        } else {
            $imagemBase64 = null;
        }

        $atleta = Atleta::find($id);
        $atleta->nomeCompleto = $request->nomeCompleto;
        $atleta->apelido = $request->apelido;
        $atleta->dataNascimento = $request->dataNascimento;
        $atleta->idade = $request->idade;
        $atleta->genero = $request->genero;
        $atleta->posicao = $request->posicao;
        $atleta->cpf = $request->cpf;
        $atleta->rg = $request->rg;
        $atleta->peso = $request->peso;
        $atleta->altura = $request->altura;
        $atleta->nomeUniforme = $request->nomeUniforme;
        $atleta->numeroUniforme = $request->numeroUniforme;
        $atleta->tamanhoUniforme = $request->tamanhoUniforme;
        $atleta->numeroCalcado = $request->numeroCalcado;
        $atleta->caminhoImagem = $imagemBase64;
        $atleta->user_id = $request->user()->id;
        $atleta->categoria_id = $request->categoria_id;
        $atleta->ativo = $request->ativo;
        $atleta->save();
        return $atleta->toJson();
    }

    function responsaveis(Request $request, string $id)
{
    // Encontre o atleta pelo ID
    $atleta = Atleta::findOrFail($id);

    // Obtenha todos os responsáveis vinculados ao atleta
    $responsaveis = $atleta->responsavels;

    return response()->json($responsaveis);
}

}
