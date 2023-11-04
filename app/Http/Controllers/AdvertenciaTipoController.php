<?php

namespace App\Http\Controllers;

use App\Models\AdvertenciaTipo;
use Illuminate\Http\Request;

class AdvertenciaTipoController extends Controller
{
    function get (Request $request, string $id) {
        return AdvertenciaTipo::find($id);
    }

    function list (Request $request) {
        $perPage = $request->input('size', 10);
        $page = $request->input('page', 1);
        $chamadas = AdvertenciaTipo::orderBy('created_at', 'asc')->paginate($perPage, ['*'], 'page', $page);

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
        $advertencia = new AdvertenciaTipo();
        $advertencia->tipoAdvertencia =$request->tipoAdvertencia;
        $advertencia->ativo =$request->ativo;
        $advertencia->save();
        return $advertencia->toJson();
    }

    function delete (Request $request, string $id) {
        $advertencia = AdvertenciaTipo::find($id);
        $advertencia->delete();
        return $advertencia->toJson();
    }

    function edit (Request $request, string $id) {
        $advertencia = AdvertenciaTipo::find($id);
        $advertencia->tipoAdvertencia =$request->tipoAdvertencia;
        $advertencia->ativo =$request->ativo;
        $advertencia->save();
        return $advertencia->toJson();
    }
}
