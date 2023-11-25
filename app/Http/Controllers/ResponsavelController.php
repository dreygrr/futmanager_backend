<?php

namespace App\Http\Controllers;

use App\Models\Responsavel;
use Illuminate\Http\Request;

class ResponsavelController extends Controller
{
    function get (Request $request, string $id) {
        return Responsavel::find($id);
    }

    function list (Request $request) {
        $perPage = $request->input('size', 10);
        $page = $request->input('page', 1);
        $responsaveis = Responsavel::with('atletas')->orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $page);

        $response = [
            'data' => $responsaveis->items(),
            'pagination' => [
                'current_page' => $responsaveis->currentPage(),
                'total_pages' => $responsaveis->lastPage(),
                'total_records' => $responsaveis->total(),
            ],
        ];

        return response()->json($response);
    }

    // function sub (Request $request, string $id) {
    //     $perPage = $request->input('size', 10);
    //     $page = $request->input('page', 1);
    //     $responsaveis = Responsavel::where('categoria_id', $id)->paginate($perPage, ['*'], 'page', $page);

    //     $response = [
    //         'data' => $responsaveis->items(),
    //         'pagination' => [
    //             'current_page' => $responsaveis->currentPage(),
    //             'total_pages' => $responsaveis->lastPage(),
    //             'total_records' => $responsaveis->total(),
    //         ],
    //     ];

    //     return response()->json($response);
    // }

    function create (Request $request) {
        $responsavel = new Responsavel();
        $responsavel->nomeCompleto = $request->nomeCompleto;
        $responsavel->dataNascimento = $request->dataNascimento;
        $responsavel->cpf = $request->cpf;
        $responsavel->rg = $request->rg;
        $responsavel->user_id = $request->user()->id;
        $responsavel->ativo = true;
        $responsavel->save();
        return $responsavel->toJson();
    }

    function delete (Request $request, string $id) {
        $responsavel = Responsavel::find($id);
        $responsavel->delete();
        return $responsavel->toJson();
    }

    function edit (Request $request, string $id) {
        $responsavel = Responsavel::find($id);
        $responsavel->nomeCompleto = $request->nomeCompleto;
        $responsavel->dataNascimento = $request->dataNascimento;
        $responsavel->cpf = $request->cpf;
        $responsavel->rg = $request->rg;
        $responsavel->user_id = $request->user()->id;
        $responsavel->ativo = $request->ativo;
        $responsavel->save();
        return $responsavel->toJson();
    }

    function atletas(Request $request, string $id)
    {
        // Encontre o responsável pelo ID
        $responsavel = Responsavel::findOrFail($id);

        \Log::info('Responsavel:', $responsavel->toArray());

        // Obtenha todos os atletas vinculados ao responsável
        $atletas = $responsavel->atletas;

        \Log::info('Atletas:', $atletas->toArray());

        return response()->json($atletas);
    }
}
