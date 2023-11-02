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
        $chamada->delete();
        return $chamada->toJson();
    }

    function edit (Request $request, string $id) {
        $chamada = ChamadaTipo::find($id);
        $chamada->tipoChamada =$request->tipoChamada;
        $chamada->ativo =$request->ativo;
        $chamada->save();
        return $chamada->toJson();
    }
}
