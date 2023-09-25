<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    function get(Request $request, string $id)
    {
        return Perfil::with(
            array('user')
        )->find($id)->toJson();
    }

    function list(Request $request)
    {
        // $perPage = 10;
        // $page = $request->input('page', 1);
        // $previsaoDeGastos = PrevisaoDeGastos::with(
        //     array('valor', 'empreendimento', 'projeto', 'centroDeCusto', 'departamento')
        // )->paginate($perPage, ['*'], 'page', $page);

        // $response = [
        //     'data' => $previsaoDeGastos->items(),
        //     'pagination' => [
        //         'current_page' => $previsaoDeGastos->currentPage(),
        //         'total_pages' => $previsaoDeGastos->lastPage(),
        //         'total_records' => $previsaoDeGastos->total(),
        //     ],
        // ];

        // return response()->json($response);
    }

    function create (Request $request) {
        $newUser = new Perfil();
        $newUser->nm_perfil =$request->nm_perfil;
        $newUser->sn_ativo =$request->sn_ativo;
        $newUser->user_id =$request->user()->id;
        $newUser->save();
        return $newUser->toJson();
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
