<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Firestore;

class Cotacoes extends Controller
{
    public function index(){
        return view('cotacoes');
    }

    public function salvarPeso(Request $request){
        $request->session()->put('pesoSacaKgs', $request->pesoSacaKgs);
        $request->session()->put('precoSaca', $request->precosmsacaindustrial);
    }


    public function getPeso(Request $request){
        return $request->session()->get('pesoSacaKgs');
    }
    public function getPrecoSaca(Request $request){
        return $request->session()->get('precoSaca');
    }

    public function verificarCotacaoCadastrada(Request $req, Firestore $firestore){
        $database = $firestore->database();

        $propriedades = $database->collection('tabelaCotacao');

        $propriedade = $propriedades->where('idPropriedade', '=', $req->session()->get('propriedade') );

        $documents = $propriedade->documents();


       if($documents->size()==0){
           return true;
       }else{
           return false;
       }


    }

    public function salvar(Request $req, Firestore $firestore)
    {
        dd('salvar');

        //
        //cotacao
        //valorDolarDolar: '',
        //            MenorOscilacaoDolar: '',
        //            MaiorOscilacaoDolar: '',
        //            valorOsciladoMenor:'',
        //            valorOsciladoMaior:'',

        $database = $firestore->database();

        $valorDolarDolar = $req->valorDolarDolar;
        $MenorOscilacaoDolar = $req->MenorOscilacaoDolar;
        $MaiorOscilacaoDolar = $req->MaiorOscilacaoDolar;
        $valorOsciladoMenor = $req->valorOsciladoMenor;
        $valorOsciladoMaior = $req->valorOsciladoMaior;



        $cotacao = $database->collection('tabelaCotacao')->newDocument();

        $cotacao->set([
            'maiorOscilacaoDolar' => $MaiorOscilacaoDolar,
            'menorOscilacaoDolar' => $MenorOscilacaoDolar,
            'valorDolar' => $valorDolarDolar,
            'valorOsciladoMenor' => $valorOsciladoMenor,
            'valorOsciladoMaior' => $valorOsciladoMaior,
            'idPropriedade' => $req->session()->get('propriedade')
        ]);
        $id = $cotacao->id();


        // name: '',
        //            precosmsacaindustrial: '',
        //            precosMquiloindustrial: '',
        //            pesoSacaKgs: '',
        //            menoroscilacao: '',
        //            valorMenorOscilacao: '',
        //            maioroscilacao: '',
        //            valorMaiorOscilacao: '',
        //            ValorHectareVenda: '',
        //            QuantidadeSacasVenda:'',
        //            ValorHectareArrendamento: '',
        //            QuantidadeSacasArrendamento: '',
        //            porcentagemValorArrendamento: '',

        foreach ($req->culturas as $cultura){
            $culturasCotacao =  $database->collection('produtoCotacao')->newDocument();

            $culturasCotacao->set([
                'Cultura'=> $cultura['name'],
                'QuantidadeSacasArrendamento' => $cultura['QuantidadeSacasArrendamento'],
                'QuantidadeSacasVenda' => $cultura['QuantidadeSacasVenda'],
                'ValorHectareArrendamento' => $cultura['ValorHectareArrendamento'],
                'ValorHectareVenda' => $cultura['ValorHectareVenda'],
                'idTabelaCotacao' => $id,
                'maiorOscilacaoCultura' => $cultura['maioroscilacao'],
                'menorOscilacaoCultura' => $cultura['menoroscilacao'],
                'pesoSacaKgs' => $cultura['pesoSacaKgs'],
                'porcentagemValorArrendamento' => $cultura['porcentagemValorArrendamento'],
                'precoMedioQuiloSaca' => $cultura['precosMquiloindustrial'],
                'precoMedioSaca' => $cultura['precosmsacaindustrial'],
                'valorMaiorOscilacao' => $cultura['valorMaiorOscilacao'],
                'valorMenorOscilacao' => $cultura['valorMenorOscilacao']
            ]);
    }

    }


    public function editar(Firestore $firestore, Request $req)
    {

        dd('editar');
        $this->firestore = $firestore;
        $database = $firestore->database();

        $valorDolarDolar = $req->valorDolarDolar;
        $menorOscilacaoDolar = $req->MenorOscilacaoDolar;
        $maiorOscilacaoDolar = $req->MaiorOscilacaoDolar;
        $valorOsciladoMenor = $req->valorOsciladoMenor;
        $valorOsciladoMaior = $req->valorOsciladoMaior;

        $propriedades = $database->collection('tabelaCotacao');

        $propriedade = $propriedades->where('idPropriedade', '=', $req->session()->get('propriedade') );

        $documents = $propriedade->documents();

        foreach ($documents as $document) {
            $id = $document->id();
            echo $id;
        }

        $atualizado = $database->collection('tabelaCotacao')->document($id);

        //'maiorOscilacaoDolar' => $MaiorOscilacaoDolar,
        //            'menorOscilacaoDolar' => $MenorOscilacaoDolar,
        //            'valorDolar' => $valorDolarDolar,
        //            'valorOsciladoMenor' => $valorOsciladoMenor,
        //            'valorOsciladoMaior' => $valorOsciladoMaior,
        //            'idPropriedade' => $req->session()->get('propriedade')

        $atualizado->update([
            ['path' => 'maiorOscilacaoDolar', 'value' => $maiorOscilacaoDolar],
            ['path' => 'menorOscilacaoDolar', 'value' => $menorOscilacaoDolar],
            ['path' => 'valorDolar', 'value' => $valorDolarDolar],
            ['path' => 'valorOsciladoMenor', 'value' => $valorOsciladoMenor],
            ['path' => 'valorOsciladoMaior', 'value' => $valorOsciladoMaior]
        ]);

        $id = $atualizado->id();



        //'Cultura'=> $cultura['name'],
        //                'QuantidadeSacasArrendamento' => $cultura['QuantidadeSacasArrendamento'],
        //                'QuantidadeSacasVenda' => $cultura['QuantidadeSacasVenda'],
        //                'ValorHectareArrendamento' => $cultura['ValorHectareArrendamento'],
        //                'ValorHectareVenda' => $cultura['ValorHectareVenda'],
        //                'idTabelaCotacao' => $id,
        //                'maiorOscilacaoCultura' => $cultura['maioroscilacao'],

        //                'menorOscilacaoCultura' => $cultura['menoroscilacao'],
        //                'pesoSacaKgs' => $cultura['pesoSacaKgs'],
        //                'porcentagemValorArrendamento' => $cultura['porcentagemValorArrendamento'],


        //                'precoMedioQuiloSaca' => $cultura['precosMquiloindustrial'],
        //                'precoMedioSaca' => $cultura['precosmsacaindustrial'],
        //                'valorMaiorOscilacao' => $cultura['valorMaiorOscilacao'],
        //                'valorMenorOscilacao' => $cultura['valorMenorOscilacao']


        $propriedade = $propriedades->where('idTabelaCotacao', '=', $id );

        $documents = $propriedade->documents();


        foreach ($req->culturas as $cultura){
            foreach ($documents as $document) {
                $document->update([
                    ['path' => 'Cultura', 'value' => $cultura['name']],
                    ['path' => 'QuantidadeSacasArrendamento', 'value' => $cultura['QuantidadeSacasArrendamento']],
                    ['path' => 'QuantidadeSacasVenda', 'value' => $cultura['QuantidadeSacasVenda']],

                    ['path' => 'ValorHectareArrendamento', 'value' => $cultura['ValorHectareArrendamento']],
                    ['path' => 'ValorHectareVenda', 'value' => $cultura['ValorHectareVenda']],
                    ['path' => 'maiorOscilacaoCultura', 'value' => $cultura['maioroscilacao']],

                    ['path' => 'menorOscilacaoCultura', 'value' => $cultura['menoroscilacao']],
                    ['path' => 'pesoSacaKgs', 'value' => $cultura['pesoSacaKgs']],
                    ['path' => 'porcentagemValorArrendamento', 'value' => $cultura['porcentagemValorArrendamento']],

                    ['path' => 'precoMedioQuiloSaca', 'value' => $cultura['precosMquiloindustrial']],
                    ['path' => 'precoMedioSaca', 'value' => $cultura['precosmsacaindustrial']],
                    ['path' => 'valorMaiorOscilacao', 'value' => $cultura['valorMaiorOscilacao']],
                        ['path' => 'valorMenorOscilacao', 'value' => $cultura['valorMenorOscilacao']]
                    ]);
                break;
            }


        }


    }

    public function verificarPropriedade(Firestore $firestore, Request $request){

            $nome =  $request->name;
            $database = $firestore->database();
            $propriedades = $database->collection('propriedade');

        $propriedade = $propriedades->where('nome', '=', $nome);

        $documents = $propriedade->documents();

            foreach ($documents as $document){
               $id= $document->id();
            }
            $request->session()->put('propriedade', $id);
    }
}
