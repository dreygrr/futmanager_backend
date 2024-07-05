<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    function get (Request $request, string $id) {
        return Categoria::find($id);
    }

    function list (Request $request) {
        $perPage = $request->input('size', 10);
        $page = $request->input('page', 1);
        $categorias = Categoria::orderBy('created_at', 'asc')->paginate($perPage, ['*'], 'page', $page);

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

    function create (Request $request) {

        $dadosImagem = $request->validate([
            'categoria' => 'required|string|unique:categorias',
            'imagem' => 'required|string',
            'ativo' => 'required|boolean',
        ]);

        $imagemBase64 = $dadosImagem['imagem']; 

        $categoriaExistente = Categoria::where('categoria', $dadosImagem['categoria'])->first();

        if ($categoriaExistente) {
            return response()->json(['message' => 'Categoria já existe.'], 400);
        }

        $novaCategoria = new Categoria();
        $novaCategoria->categoria = $dadosImagem['categoria'];
        $novaCategoria->caminhoImagem = $imagemBase64;
        $novaCategoria->ativo = $dadosImagem['ativo'];
        $novaCategoria->save();

        return $novaCategoria->toJson();
        
    }

    function delete (Request $request, string $id) {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return $categoria->toJson();
    }

    function edit (Request $request, string $id) {
        $dadosImagem = $request->validate([
            'imagem' => 'required|string',
        ]);

        $imagemBase64 = $dadosImagem['imagem'];

        $categoria = Categoria::find($id);
        $categoria->categoria =$request->categoria;
        $categoria->caminhoImagem = $imagemBase64;
        $categoria->ativo =$request->ativo;
        $categoria->save();
        return $categoria->toJson();
    }
}
