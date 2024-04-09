<?php

namespace App\Http\Controllers;

use App\Models\ChamadaTipo;
use Illuminate\Http\Request;

class ChamadaTipoController extends Controller
{
    function get (Request $request, string $id) {
        return ChamadaTipo::find($id);
    }

    function list (Request $request) {
        $perPage = $request->input('size', 10);
        $page = $request->input('page', 1);
        $chamadas = ChamadaTipo::orderBy('created_at', 'asc')->paginate($perPage, ['*'], 'page', $page);

        $response = [
            'data' => $chamadas->items(),
            'pagination' => [
                'current_page' => $chamadas->currentPage(),
                'total_pages' => $chamadas->lastPage(),
                'total_records' => $chamadas->total(),
            ],
        ];

        return response()->json($response);
    }

    function create (Request $request) {
        $chamada = new ChamadaTipo();
        $chamada->tipoChamada =$request->tipoChamada;
        $chamada->ativo =$request->ativo;
        $chamada->save();
        return $chamada->toJson();
    }

    function delete (Request $request, string $id) {
        $chamada = ChamadaTipo::find($id);
        if (!$chamada) {
            return response()->json(['message' => 'Tipo de chamada não encontrado'], 404);
        }
        try {
            $chamada->delete();
            return $chamada->toJson();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Falha em deletar o registro'], 500);
        }
    }

    function edit (Request $request, string $id) {
        $chamada = ChamadaTipo::find($id);
        if (!$chamada) {
            return response()->json(['message' => 'Tipo de chamada não encontrado'], 404);
        }
        $validatedData = $request->validate([
            'tipoChamada' => 'required',
            'ativo' => 'required',
        ]);
        try {
            $chamada->tipoChamada = $validatedData['tipoChamada'];
            $chamada->ativo = $validatedData['ativo'];
            $chamada->save();
            return $chamada->toJson();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Falha em editar o registro'], 500);
        }
    }
}
