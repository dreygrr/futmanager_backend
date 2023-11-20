<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use App\Models\Responsavel;
use Illuminate\Http\Request;
use App\Models\AtletaResponsavel;

class AtletaResponsavelController extends Controller
{
    function get (Request $request, string $id) {
        return AtletaResponsavel::find($id);
    }

    function listResponsavel (Request $request, string $id) {
        $perPage = $request->input('size', 10);
        $page = $request->input('page', 1);

        $chamadas = AtletaResponsavel::when($id, function ($query) use ($id) {
            return $query->where('responsavel_id', $id);
        })
        ->orderBy('created_at', 'asc')
        ->paginate($perPage, ['*'], 'page', $page);

        $formattedChamadas = [];
        foreach ($chamadas->items() as $chamada) {
        $formattedAtletas = [];
        foreach ($chamada->atletas as $atleta) {
            $formattedAtleta = [
                'id' => $atleta->id,
                'created_at' => $atleta->created_at,
                'updated_at' => $atleta->updated_at,
                'nomeCompleto' => $atleta->nomeCompleto,
                // Adicione outros campos necessários do modelo Atleta
            ];
            $formattedAtletas[] = $formattedAtleta;
        }

        $formattedChamada = [
            'id' => $chamada->id,
            'atleta_id' => $chamada->atleta_id,
            'responsavel_id' => $chamada->responsavel_id,
            'created_at' => $chamada->created_at,
            'updated_at' => $chamada->updated_at,
            'atletas' => $formattedAtletas,
        ];

        $formattedChamadas[] = $formattedChamada;
    }

        $response = [
            'data' => $formattedChamadas,
            'pagination' => [
                'current_page' => $chamadas->currentPage(),
                'total_pages' => $chamadas->lastPage(),
                'total_records' => $chamadas->total(),
            ],
        ];

        return response()->json($response);
    }

    function create (Request $request) {
        $atletaResponsavel = new AtletaResponsavel();
        $atletaResponsavel->atleta_id =$request->atleta_id;
        $atletaResponsavel->responsavel_id =$request->responsavel_id;
        $atletaResponsavel->save();
        return $atletaResponsavel->toJson();
    }

    function delete (Request $request, string $id) {
        $atletaResponsavel = AtletaResponsavel::find($id);
        $atletaResponsavel->delete();
        return $atletaResponsavel->toJson();
    }

    public function associarResponsavel(Request $request)
    {
        $atleta = Atleta::find($request->atleta_id);
        $responsavel = Responsavel::find($request->responsavel_id);

        if ($atleta && $responsavel) {
            $responsavel->atletas()->attach($atleta->id);

            return response()->json(['message' => 'Associação criada com sucesso']);
        } else {
            return response()->json(['message' => 'Atleta ou responsável não encontrado'], 404);
        }
    }
}
