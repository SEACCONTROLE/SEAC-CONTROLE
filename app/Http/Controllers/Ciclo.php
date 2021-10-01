<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\Factory;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Database;

class Ciclo extends Controller
{
    public function cadastrar(Firestore $firestore, Request $req)
    {
        $database = $firestore->database();

        $inicio = $req->inicio;
        $termino = $req->termino;
        $periodo = $req->periodo;

        $cadastro = $database->collection('Ciclo')->newDocument();

        $cadastro->set([
            'dataFimPlantio' => $inicio,
            'dataInicioPlantio' => $termino,
            'periodoEmDias' => $periodo,
            'idPropriedade' => $req->session()->get('propriedade')
        ]);
    }


    public function getCiclos(Firestore $firestore, Request $req)
    {
        $documents = $firestore->database()->collection('Ciclo')->documents();
        $ciclos= [];
        foreach ($documents as $document) {
            if($document->data()['dataInicioPlantio']!= "" && $document->data()['idPropriedade'] == $req->session()->get('propriedade')) {
                array_push($ciclos, $document->data());
            }

        }

        return $ciclos;
    }

    public function deletar(Firestore $firestore, Request $req)
    {
        $database = $firestore->database();

        $inicio = $req->inicio;



        $propriedades = $database->collection('Ciclo');

        $propriedade = $propriedades->where('dataInicioPlantio', '=', $inicio);

        $documents = $propriedade->documents();

        foreach ($documents as $document) {
            $id = $document->id();
        }

        $database->collection('Ciclo')->document($id)->delete();

    }


    public function verificarCiclo(Firestore $firestore, Request $request){

        $inicio =  $request->inicio;
        $database = $firestore->database();
        $ciclos = $database->collection('Ciclo');

        $ciclo = $ciclos->where('dataInicioPlantio', '=', $inicio);

        $documents = $ciclo->documents();

        foreach ($documents as $document){
            $id= $document->id();
            $request->session()->put('ciclo', $id);
        }
    }

}
