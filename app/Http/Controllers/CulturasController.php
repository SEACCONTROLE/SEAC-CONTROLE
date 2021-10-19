<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Firebase\Auth\Token\Exception\InvalidToken;
use Kreait\Firebase\Exception\Auth\RevokedIdToken;
use Kreait\Firebase\Firestore;

class CulturasController extends Controller
{
    protected $culturas;
    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(__DIR__.'/keySimuladorSEAC.json')
            ->withDatabaseUri('https://simuladorseac.firebaseio.com/');

        $this->database = $factory->createDatabase();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Firestore $firestore)
    {

        $documents = $firestore->database()->collection('produto')->documents();
        $culturas= [];
        foreach ($documents as $document) {
            array_push($culturas, $document->data());

        }

        return $culturas;

    }

    public function getCulturas(Request $request, Firestore $firestore){
        $documents = $firestore->database()->collection('produto')->documents();
        $culturas= [];
        foreach ($documents as $document) {
            if($document->data()['UID'] == $request->session()->get('firebaseUserId')) {
                array_push($culturas, $document->data());
            }

        }

        return $culturas;
    }



    public function culturasCotacao(Firestore $firestore)
    {

        $documents = $firestore->database()->collection('produto')->documents();
        $culturas= [];
        foreach ($documents as $document) {
            array_push($culturas, $document->data());
        }

        return $culturas;

    }

    public function editar(Firestore $firestore, Request $req)
    {

        $database = $firestore->database();

        $nome = $req->novoItem['name'];
        $cultivarNovo = $req->novoItem['cultivar'];
        $cultivarAntigo = $req->editItem['cultivar'];



        $culturas = $database->collection('produto');

        $cultura = $culturas->where('variedadeCultivada', '=', $cultivarAntigo);

        $documents = $cultura->documents();

        foreach ($documents as $document) {
            $id = $document->id();
            $atualizado = $database->collection('produto')->document($id);
            $atualizado->update([
                ['path' => 'nomeProduto', 'value' => $nome],
                ['path' => 'variedadeCultivada', 'value' => $cultivarNovo]
            ]);
        }




    }

    public function deletar(Firestore $firestore, Request $req)
    {
        $database = $firestore->database();

        $cultivar = $req->cultivar;

        $culturas = $database->collection('produto');

        $cultura = $culturas->where('variedadeCultivada', '=', $cultivar);

        $documents = $cultura->documents();

        foreach ($documents as $document) {
            $id = $document->id();
            $database->collection('produto')->document($id)->delete();
        }


    }

    public function cadastrar(Firestore $firestore, Request $req)
    {
        $database = $firestore->database();

        $nome = $req->name;
        $proprietario = $req->cultivar;

        $cadastro = $database->collection('produto')->newDocument();
        $cadastro->set([
            'nomeProduto' => $nome,
            'variedadeCultivada' => $proprietario,
            'UID' => $req->session()->get('firebaseUserId')
        ]);
    }


}
