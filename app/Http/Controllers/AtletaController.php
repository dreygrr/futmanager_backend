<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use Illuminate\Http\Request;

class AtletaController extends Controller
{
    function get (Request $request, string $id) {
        return Atleta::find($id);
    }

    function list (Request $request) {
        $perPage = $request->input('size', 10);
        $page = $request->input('page', 1);
        $atletas = Atleta::orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $page);

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
        $atletas = Atleta::where('categoria_id', $id)->paginate($perPage, ['*'], 'page', $page);

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

    function create (Request $request) {
        $atleta = new Atleta();
        $atleta->nomeCompleto = $request->nomeCompleto;
        $atleta->apelido = $request->apelido;
        $atleta->dataNascimento = $request->dataNascimento;
        $atleta->idade = $request->idade;
        $atleta->genero = $request->genero;
        $atleta->cpf = $request->cpf;
        $atleta->rg = $request->rg;
        $atleta->nomeUniforme = $request->nomeUniforme;
        $atleta->numeroUniforme = $request->numeroUniforme;
        $atleta->tamanhoUniforme = $request->tamanhoUniforme;
        $atleta->numeroCalcado = $request->numeroCalcado;
        $atleta->user_id = $request->user()->id;
        $atleta->categoria_id = $request->categoria_id;
        $atleta->ativo = true;
        $atleta->save();
        return $atleta->toJson();
    }

    function delete (Request $request, string $id) {
        $atleta = Atleta::find($id);
        $atleta->delete();
        return $atleta->toJson();
    }

    function edit (Request $request, string $id) {
        $atleta = Atleta::find($id);
        $atleta->nomeCompleto = $request->nomeCompleto;
        $atleta->apelido = $request->apelido;
        $atleta->dataNascimento = $request->dataNascimento;
        $atleta->idade = $request->idade;
        $atleta->genero = $request->genero;
        $atleta->cpf = $request->cpf;
        $atleta->rg = $request->rg;
        $atleta->nomeUniforme = $request->nomeUniforme;
        $atleta->numeroUniforme = $request->numeroUniforme;
        $atleta->tamanhoUniforme = $request->tamanhoUniforme;
        $atleta->numeroCalcado = $request->numeroCalcado;
        $atleta->user_id = $request->user()->id;
        $atleta->categoria_id = $request->categoria_id;
        $atleta->ativo = $request->ativo;
        $atleta->save();
        return $atleta->toJson();
    }
}
