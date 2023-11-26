<?php

namespace App\Http\Controllers;

use App\Models\Advertencia;
use Illuminate\Http\Request;

class AdvertenciaController extends Controller
{
    function get (Request $request, string $id) {
        return Advertencia::find($id);
    }

    function list (Request $request) {
        $perPage = $request->input('size', 10);
        $page = $request->input('page', 1);
        $chamadas = Advertencia::orderBy('created_at', 'asc')->paginate($perPage, ['*'], 'page', $page);

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
        $advertencia = new Advertencia();
        $advertencia->data =$request->data;
        $advertencia->chamada_id =$request->chamada_id;
        $advertencia->atleta_id =$request->atleta_id;
        $advertencia->advertencia_tipo_id =$request->advertencia_tipo_id;
        $advertencia->justificativa =$request->justificativa;
        $advertencia->save();
        return $advertencia->toJson();
    }

    function delete (Request $request, string $id) {
        $advertencia = Advertencia::find($id);
        $advertencia->delete();
        return $advertencia->toJson();
    }

    function edit (Request $request, string $id) {
        $advertencia = Advertencia::find($id);
        $advertencia->data =$request->data;
        $advertencia->chamada_id =$request->chamada_id;
        $advertencia->atleta_id =$request->atleta_id;
        $advertencia->advertencia_tipo_id =$request->advertencia_tipo_id;
        $advertencia->justificativa =$request->justificativa;
        $advertencia->save();
        return $advertencia->toJson();
    }
}
