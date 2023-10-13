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

    function create (Request $request) {
        $NovoAtleta = new Atleta();
        $NovoAtleta->nm_atletaCompleto = $request->nm_atletaCompleto;
        $NovoAtleta->nm_apelido = $request->nm_apelido;
        $NovoAtleta->dt_nascimento = $request->dt_nascimento;
        $NovoAtleta->nu_idade = $request->nu_idade;
        $NovoAtleta->tp_genero = $request->tp_genero;
        $NovoAtleta->nu_cpf = $request->nu_cpf;
        $NovoAtleta->nu_rg = $request->nu_rg;
        $NovoAtleta->nm_camiseta = $request->nm_camiseta;
        $NovoAtleta->nu_camiseta = $request->nu_camiseta;
        $NovoAtleta->nu_calcado = $request->nu_calcado;
        $NovoAtleta->user_id = $request->user()->id;
        $NovoAtleta->categoria_id = $request->categoria_id;
        $NovoAtleta->sn_ativo = true;
        $NovoAtleta->save();
        return $NovoAtleta->toJson();
    }

    function delete (Request $request, string $id) {
        $atleta = Atleta::find($id);
        $atleta->delete();
        return $atleta->toJson();
    }

    function edit (Request $request, string $id) {
        $atleta = Atleta::find($id);
        $atleta->nm_atletaCompleto = $request->nm_atletaCompleto;
        $atleta->nm_apelido = $request->nm_apelido;
        $atleta->dt_nascimento = $request->dt_nascimento;
        $atleta->nu_idade = $request->nu_idade;
        $atleta->tp_genero = $request->tp_genero;
        $atleta->nu_cpf = $request->nu_cpf;
        $atleta->nu_rg = $request->nu_rg;
        $atleta->nm_camiseta = $request->nm_camiseta;
        $atleta->nu_camiseta = $request->nu_camiseta;
        $atleta->nu_calcado = $request->nu_calcado;
        $atleta->user_id = $request->user()->id;
        $atleta->categoria_id = $request->categoria()->id;
        $atleta->sn_ativo = $request->sn_ativo;
        $atleta->save();
        return $atleta->toJson();
    }
}
