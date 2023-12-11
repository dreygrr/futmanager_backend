<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function get (Request $request, string $id) {
        return User::with('atleta')->find($id);
    }

    function me (Request $request) {
        return $request->user();
    }

    function list (Request $request) {
        $perPage = 10;
        $page = $request->input('page', 1);
        $users = User::with('perfil')->orderBy('created_at', 'asc')->paginate($perPage, ['*'], 'page', $page);

        $response = [
            'data' => $users->items(),
            'pagination' => [
                'current_page' => $users->currentPage(),
                'total_pages' => $users->lastPage(),
                'total_records' => $users->total(),
            ],
        ];

        return response()->json($response);
    }

    function create (Request $request) {
        if ($request->imagem) {
            $dadosImagem = $request->validate([
                'imagem' => 'required|string',
            ]);

            $imagemBase64 = $dadosImagem['imagem'];
        } else {
            $imagemBase64 = null;
        }

        $user = new User();
        $user->name =$request->name;
        $user->login =$request->login;
        $user->password =$request->password;
        $user->ativo =$request->ativo;
        $user->perfil_id =$request->perfil_id;
        $user->caminhoImagem = $imagemBase64;
        $user->atleta_id =$request->atleta_id;
        $user->save();
        return $user->toJson();
    }

    function delete (Request $request, string $id) {
        $user = User::all()->find($id);
        $user->delete();
        return $user->toJson();
    }

    function edit (Request $request, string $id) {
        if ($request->imagem) {
            $dadosImagem = $request->validate([
                'imagem' => 'required|string',
            ]);

            $imagemBase64 = $dadosImagem['imagem'];
        } else {
            $imagemBase64 = null;
        }

        $user = User::all()->find($id);
        $user->name =$request->name;
        $user->login =$request->login;
        if ($request->password) {
            $user->password =$request->password;
        }
        $user->ativo =$request->ativo;
        $user->perfil_id =$request->perfil_id;
        $user->caminhoImagem =$request->$imagemBase64;
        $user->atleta_id =$request->atleta_id;
        $user->save();
        return $user->toJson();
    }
}
