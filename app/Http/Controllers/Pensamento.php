<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\Factory;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Database;


class Pensamento extends Controller

{

    public function getPensamentos(Request $request, Firestore $firestore){
        $documents = $firestore->database()->collection('tabelaPensamento')->documents();
        $propriedades= [];

        foreach ($documents as $document) {
            if($document->data()['idCiclo'] == $request->session()->get('ciclo')) {
                array_push($propriedades, $document->data());
            }

        }

        return $propriedades;
    }

    public function salvar(Request $req, Firestore $firestore)
    {


        $database = $firestore->database();

        $cultura = $req->name;
        $cultivar = $req->cultivar;
        $idTalhao = $req->idTalhao;
        $sistemaPlantio = $req->sistemaPlantio;
        $areaTotalTalhao = $req->areaTotalTalhao;
        $areaDisponivelTalhao = $req->areaDisponivelTalhao;
        $areaDisponivelEmHa = $req->areaDisponivelEmHa;
        $estimativaKgs = $req->estimativaKgs;
        $pesoMedioSacaKgs = $req->pesoMedioSacaKgs;
        $estimativaColheitaKgs = $req->estimativaColheitaKgs;
        $estimativaColheitasSacasHa = $req->estimativaColheitasSacasHa;
        $estimativaColheitaTotalSacas = $req->estimativaColheitaTotalSacas;
        $desejoMargemLiquida = $req->desejoMargemLiquida;


        $pensamento = $database->collection('tabelaPensamento')->newDocument();

        $pensamento->set([
            'idCiclo' => $req->session()->get('ciclo'),
            'cultura' => $cultura,
            'cultivar' => $cultivar,
            'idTalhao' => $idTalhao,
            'sistemaPlantio' => $sistemaPlantio,
            'areaTotalTalhao' => $areaTotalTalhao,
            'areaDisponivelTalhao' => $areaDisponivelTalhao,
            'areaDisponivelEmHa' => $areaDisponivelEmHa,
            'estimativaKgs' => $estimativaKgs,
            'pesoMedioSacaKgs'=>$pesoMedioSacaKgs,
            'estimativaColheitaKgs'=>$estimativaColheitaKgs,
            'estimativaColheitasSacasHa' => $estimativaColheitasSacasHa,
            'estimativaColheitaTotalSacas' => $estimativaColheitaTotalSacas,
            'desejoMargemLiquida' => $desejoMargemLiquida

        ]);

    }
}
