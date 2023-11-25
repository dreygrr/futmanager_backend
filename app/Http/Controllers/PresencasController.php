<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use App\Models\Chamada;
use App\Models\Presencas;
use Illuminate\Http\Request;

class PresencasController extends Controller
{
    function registrarPresencas(Request $request)
    {
        $chamadaId = $request->input('chamada_id');
        $categoria_id = $request->input('categoria_id');
        $atletasIds = $request->input('atletas');

        $atletasCategoria = Atleta::where('categoria_id', $categoria_id)->pluck('id')->toArray();

        // Limpe as presenças existentes para esta chamada
        Presencas::where('chamada_id', $chamadaId)->delete();

        // Registre as novas presenças
        foreach ($atletasCategoria as $atletaId) {
            $presenca = in_array($atletaId, $atletasIds);
            Presencas::create([
                'chamada_id' => $chamadaId,
                'atleta_id' => $atletaId,
                'presenca' => $presenca,
            ]);
        }

        $chamada = Chamada::find($chamadaId);
        $chamada->finalizada = true;
        $chamada->save();

        return response()->json(['message' => 'Presenças registradas com sucesso']);
    }

    function visualizarPresencas(Request $request, string $chamadaId)
    {
        $presencas = Presencas::where('chamada_id', $chamadaId)->get();

        // Obtenha os detalhes dos atletas e inclua a informação de presença
        $detalhesAtletas = Atleta::whereIn('id', $presencas->pluck('atleta_id')->toArray()) ->orderBy('numeroUniforme', 'asc')->get();

        // Adicione a informação de presença para cada atleta
        $atletasComPresenca = $detalhesAtletas->map(function ($atleta) use ($presencas) {
            $atleta->presente = $presencas->where('atleta_id', $atleta->id)->first()->presenca ?? false;
            return $atleta;
        });

        $response = [
            'data' => $atletasComPresenca,
        ];

        return response()->json($response);
    }
}
