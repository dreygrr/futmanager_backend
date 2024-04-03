<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    function get(Request $request, string $id)
    {
        return Perfil::all()->find($id)->toJson();
    }

    function list(Request $request)
    {
        $perPage = 10;
        $page = $request->input('page', 1);
        $perfils = Perfil::orderBy('created_at', 'asc')->paginate($perPage, ['*'], 'page', $page);

        $response = [
            'data' => $perfils->items(),
            'pagination' => [
                'current_page' => $perfils->currentPage(),
                'total_pages' => $perfils->lastPage(),
                'total_records' => $perfils->total(),
            ],
        ];

        return response()->json($response);
    }

    function create (Request $request) {
        $perfil = new Perfil();
        $perfil->perfil =$request->perfil;
        $perfil->ativo =$request->ativo;
        // $perfil->created_at =date("Y-m-d H:i:s");
        $perfil->created_at ="2024-04-01";
        $perfil->save();
        return $perfil->toJson();
    }

    function delete (Request $request, string $id) {
        $perfil = Perfil::all()->find($id);
        $perfil->delete();
        return $perfil->toJson();
    }

    function edit (Request $request, string $id) {
        $perfil = Perfil::all()->find($id);
        $perfil->perfil =$request->perfil;
        $perfil->ativo =$request->ativo;
        $perfil->save();
        return $perfil->toJson();
    }
}
