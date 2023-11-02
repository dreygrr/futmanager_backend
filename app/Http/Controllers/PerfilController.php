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
        $perfils = Perfil::orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $page);

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
        $novoPerfil = new Perfil();
        $novoPerfil->perfil =$request->perfil;
        $novoPerfil->ativo =$request->ativo;
        $novoPerfil->save();
        return $novoPerfil->toJson();
    }

    // function delete (Request $request, string $id) {
    //     $user = User::all()->find($id);
    //     $user->delete();
    //     return $user->toJson();
    // }

    // function edit (Request $request, string $id) {
    //     $user = User::all()->find($id);
    //     $user->name =$request->name;
    //     $user->email =$request->email;
    //     $user->password =$request->password;
    //     $user->save();
    //     return $user->toJson();
    // }
}
