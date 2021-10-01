<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\Factory;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Database;

class Propriedades extends Controller
{
    public function index(Firestore $firestore){

        $documents = $firestore->database()->collection('propriedade')->documents();
        $propriedades= [];
        foreach ($documents as $document) {
            if($document->data()['cpf']!= "") {
                array_push($propriedades, $document->data());
            }

        }

        return $propriedades;

    }


    public function getPropriedades(Request $request, Firestore $firestore){
        $documents = $firestore->database()->collection('propriedade')->documents();

        $propriedades= [];
        foreach ($documents as $document) {
            if($document->data()['cpf']!= "" && $document->data()['UID'] == $request->session()->get('firebaseUserId')) {
                array_push($propriedades, $document->data());
            }

        }

        return $propriedades;
    }

    public function cadastrar(Firestore $firestore, Request $req)
    {
        $this->firestore = $firestore;
        $database = $firestore->database();

        $nome = $req->name;
        $proprietario = $req->proprietario;
        $cpf = $req->cpf;

        $cadastro = $database->collection('propriedade')->newDocument();
        $cadastro->set([
            'nome' => $nome,
            'proprietario' => $proprietario,
            'cpf' => $cpf,
            'UID' => $req->session()->get('firebaseUserId'),
            'valorHectareArrendamento' => '0',
            'valorHectareVenda' => '0'
        ]);
    }

    public function editar(Firestore $firestore, Request $req)
    {
        $this->firestore = $firestore;
        $database = $firestore->database();

        $nome = $req->name;
        $proprietario = $req->proprietario;
        $cpf = $req->cpf;

        $propriedades = $database->collection('propriedade');

        $propriedade = $propriedades->where('nome', '=', $nome);

        $documents = $propriedade->documents();

        foreach ($documents as $document) {
            $id = $document->id();
            echo $id;
        }

        $atualizado = $database->collection('propriedade')->document($id);

        $atualizado->update([
            ['path' => 'nome', 'value' => $nome],
            ['path' => 'proprietario', 'value' => $proprietario],
            ['path' => 'cpf', 'value' => $cpf]
        ]);
    }

    public function deletar(Firestore $firestore, Request $req)
    {
        $database = $firestore->database();

        $nome = $req->name;

        $propriedades = $database->collection('propriedade');

        $propriedade = $propriedades->where('nome', '=', $nome);

        $documents = $propriedade->documents();

        foreach ($documents as $document) {
            $id = $document->id();
            $database->collection('propriedade')->document($id)->delete();
        }


    }
}
