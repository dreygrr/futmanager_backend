<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Chamada;
use Illuminate\Http\Request;

class ChamadaController extends Controller
{
    function get (Request $request, string $id) {
        return Chamada::find($id);
    }

    function list (Request $request) {
        $perPage = $request->input('size', 10);
        $page = $request->input('page', 1);
        $categorias = Chamada::with(['chamadaTipo', 'categoria', 'user'])->orderBy('created_at', 'asc')->paginate($perPage, ['*'], 'page', $page);

        $response = [
            'data' => $categorias->items(),
            'pagination' => [
                'current_page' => $categorias->currentPage(),
                'total_pages' => $categorias->lastPage(),
                'total_records' => $categorias->total(),
            ],
        ];

        return response()->json($response);
    }

    function presenca (Request $request, string $id) {
        $chamada = Chamada::with(['chamadaTipo', 'categoria', 'user'])->find($id);

        return $chamada->toJson();
    }

    function create (Request $request) {
        $chamada = new Chamada();
        $chamada->dataChamada =$request->dataChamada;
        $chamada->horaChamada =$request->horaChamada;
        $chamada->chamada_tipo_id =$request->chamada_tipo_id;
        $chamada->categoria_id =$request->categoria_id;
        $chamada->user_id =$request->user_id;
        $chamada->finalizada =$request->finalizada;
        $chamada->save();
        return $chamada->toJson();
    }

    function delete (Request $request, string $id) {
        $chamada = Chamada::find($id);
        $chamada->delete();
        return $chamada->toJson();
    }

    function edit (Request $request, string $id) {
        $chamada = Chamada::find($id);
        $chamada->dataChamada =$request->dataChamada;
        $chamada->horaChamada =$request->horaChamada;
        $chamada->chamada_tipo_id =$request->chamada_tipo_id;
        $chamada->categoria_id =$request->categoria_id;
        $chamada->user_id =$request->user_id;
        $chamada->finalizada =$request->finalizada;
        $chamada->save();
        return $chamada->toJson();
    }
}
