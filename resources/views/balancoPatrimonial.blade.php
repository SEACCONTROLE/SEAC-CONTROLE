@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <form method="POST" action="balancoPatrimonial">
                    <div class="card-body">
                    <div class="card-header text-md-center">{{ __('Estrutura Do Balanço Patrimonial') }}</div>
                        <div class="card-body row">
                            <div class="col-sm-6 card-header text-md-center">{{ __('Ativo') }}</div>
                            <div class="col-sm-6 card-header text-md-center">{{ __('Passivo') }}</div>


                             <div class="card-body row">
                        <div class="col-sm-6 card-header">{{ __('CIRCULANTE (A)') }}

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="numeroA" class="form-control">{{ __('N°') }}</label>
                                </div>

                                <div class="col-md-6">
                                    <label for="circulanteA" class="form-control">{{ __('Descrição°') }}</label>
                                </div>
                                <div class="col-md-4">
                                    <label for="circulanteA" class="form-control">{{ __('Valor') }}</label>
                                </div>
                            </div>


                            <div class="form-group row" id="listaA">
                                <div class="col-md-2">
                                    <label for="circulanteA" class="form-control">{{ __('1 ') }}</label>
                                </div>

                                <div class="col-md-6">
                                    <input id="descricaocirculanteA1" type="text" class="form-control @error('descricaocirculanteA1') is-invalid @enderror" name="descricaocirculanteA1" autofocus>
                                </div>
                                <div class="col-md-4">
                                    <input id="valorcirculanteA1" type="text" class="form-control @error('valorcirculanteA1') is-invalid @enderror" name="valorcirculanteA1" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="totalA" class="col-form-label text-md-right">{{ __('Total Ativo Circulante (A)') }}</label>

                                    <label for="totalCirculanteA" class="form-control">{{ __('Total A') }}</label>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6 card-header">{{ __('CIRCULANTE (D)') }}

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="numeroD" class="form-control">{{ __('N°') }}</label>
                                </div>

                                <div class="col-md-6">
                                    <label for="descricaocirculanteD" class="form-control">{{ __('Descrição°') }}</label>
                                </div>
                                <div class="col-md-4">
                                    <label for="valorcirculanteD" class="form-control">{{ __('Valor') }}</label>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-2" id="listaD">
                                    <label for="circulanteD1" class="form-control">{{ __('1 ') }}</label>
                                </div>

                                <div class="col-md-6">
                                    <input id="descricaocirculanteD1" type="text" class="form-control @error('descricaocirculanteD1') is-invalid @enderror" name="descricaocirculanteD1" autofocus>
                                </div>
                                <div class="col-md-4">
                                    <input id="valorcirculanteD1" type="text" class="form-control @error('valorcirculanteD1') is-invalid @enderror" name="valorcirculanteD1" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="totalD" class="col-form-label text-md-right">{{ __('Total Passivo Circulante (D)') }}</label>

                                    <label for="totalCirculanteD" class="form-control">{{ __('Total D') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                            <div class="card-body row">
                                <div class="col-sm-6 card-header">{{ __('REALIZAVEIS LONGO PRAZO (B)') }}

                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <label for="numeroA" class="col-form-label text-md-right">{{ __('1°') }}</label>
                                        </div>

                                        <div class="col-md-10">
                                            <label for="circulanteB" class="col-form-label text-md-left">{{ __('À Receber (Saldo total para mais de 1 ano)') }}</label>

                                            <input id="aReceber" type="text" class="form-control @error('aReceber') is-invalid @enderror" name="aReceber" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="totalB" class="col-form-label text-md-right">{{ __('Total Realizaveis Longo Prazo (B)') }}</label>

                                            <label for="totalCirculanteB" class="form-control">{{ __('Total B') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="totalRealizavel" class="col-form-label text-md-right">{{ __('Total realizavelvel (A+B)') }}</label>

                                            <label for="totalRealizavel" class="form-control">{{ __('A+B') }}</label>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-sm-6 card-header">{{ __('EXIGIVEL NO LONGO PRAZO (E)') }}
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <label for="numeroA" class="col-form-label text-md-right">{{ __('1°') }}</label>
                                        </div>

                                        <div class="col-md-10">
                                            <label for="circulanteE" class="col-form-label text-md-left">{{ __('À Pagar (Saldo total para mais de 1 ano)') }}</label>

                                            <input id="aPagar" type="text" class="form-control @error('aPagar') is-invalid @enderror" name="aPagar" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <label for="totalE" class="col-form-label text-md-right">{{ __('Total Exigível Longo Prazo (E)') }}</label>

                                            <label for="totalCirculanteD" class="form-control">{{ __('Total E') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <label for="totalExigivel" class="col-form-label text-md-right">{{ __('Total Exigivel (D+E)') }}</label>

                                            <label for="totalExigivel" class="form-control">{{ __('D+E') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body row">
                                <div class="col-sm-6 card-header">{{ __('FIXO ou PERMANENTE ( C )') }}

                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <label for="numeroC" class="form-control">{{ __('N°') }}</label>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="fixooupermanenteC" class="form-control">{{ __('Descrição°') }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fixooupermanenteC" class="form-control">{{ __('Valor') }}</label>
                                        </div>
                                    </div>


                                    <div class="form-group row" id="listaA">
                                        <div class="col-md-2">
                                            <label for="numeroC" class="form-control">{{ __('1 ') }}</label>
                                        </div>

                                        <div class="col-md-6">
                                            <input id="descricaoC1" type="text" class="form-control @error('descricaoC1') is-invalid @enderror" name="descricaoC1" autofocus>
                                        </div>
                                        <div class="col-md-4">
                                            <input id="valorC1" type="text" class="form-control @error('valorC1') is-invalid @enderror" name="valorC1" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="totalC" class="col-form-label text-md-right">{{ __('Total Fixo ( C )') }}</label>

                                            <label for="totalC" class="form-control">{{ __('Total C') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="totalC" class="col-form-label text-md-right">{{ __('Ativo Total (A+B+C)') }}</label>

                                            <label for="ativoTotalC" class="form-control">{{ __('Total A+B+C') }}</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6 card-header">{{ __('PATRIMÔNIO LIQUIDO (F)') }}
                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <label for="totalF" class="col-form-label text-md-right">{{ __('(Total Do Ativo - Total Exigível) - Capital Próprio') }}</label>

                                            <label for="totalativoF" class="form-control">{{ __('Total F') }}</label>
                                        </div>
                                    </div>


                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <label for="passivoTotalF" class="col-form-label text-md-right">{{ __('Passivo Total (D+E+F)') }}</label>

                                            <label for="passivoToalDEF" class="form-control">{{ __('Total D+E+F') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                        <div class="card-body">
                            <div class="card-header text-md-center">{{ __('Indicadores Do Balanço Patrimonial') }}</div>

                            <div class="card-body row">
                                <div class="card-body row">

                                        <div class="col-md-4">
                                            <label for="totalExigivel" class="form-control">{{ __('Capital Circulante Líquido (CCL)') }}</label>

                                            <label for="totalExigivel" class="form-control">{{ __('Capital De Giro R$	') }}</label>
                                        </div>

                                    <div class="col-md-2">
                                        <label for="totalExigivel" class="form-control">{{ __('AC-PC') }}</label>

                                        <label for="totalExigivel" class="form-control">{{ __('-30.000,00') }}</label>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="totalExigivel" class="form-control">{{ __('Grau De Endividamento (GE)%') }}</label>

                                        <label for="totalExigivel" class="form-control">{{ __('Percentual de endividamento %')}}</label>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="totalExigivel" class="form-control">{{ __('((PC+ELP)/AT)*100') }}</label>

                                        <label for="totalExigivel" class="form-control">{{ __('19,30') }}</label>
                                    </div>
                                </div>


                                <div class="card-body row">

                                    <div class="col-md-4">
                                        <label for="totalExigivel" class="form-control">{{ __('Indice De Liquidez Corrente (ILC)') }}</label>

                                        <label for="totalExigivel" class="form-control">{{ __('Para cada R$ 1,00 de dívida de curto prazo, quanto possuo R$ disponível?') }}</label>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="totalExigivel" class="form-control">{{ __('AC-PC') }}</label>

                                        <label for="totalExigivel" class="form-control">{{ __('0,73') }}</label>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="totalExigivel" class="form-control">{{ __('Lucratividade %') }}</label>

                                        <label for="totalExigivel" class="form-control">{{ __('Lucro Liquido / Receita Bruta *100')}}</label>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="totalExigivel" class="form-control">{{ __('(LL/RB)*100') }}</label>

                                        <label for="totalExigivel" class="form-control">{{ __('-0,3') }}</label>
                                    </div>
                                </div>



                                <div class="card-body row">

                                    <div class="col-md-4">
                                        <label for="totalExigivel" class="form-control">{{ __('Indice De Liquidez Geral (ILG)') }}</label>

                                        <label for="totalExigivel" class="form-control">{{ __('Para cada R$ 1,00 de dívida de longo prazo, quanto possuo R$ disponível?	') }}</label>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="totalExigivel" class="form-control">{{ __('(AC+RPL)/(PC+ELP)') }}</label>

                                        <label for="totalExigivel" class="form-control">{{ __('0,07') }}</label>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="totalExigivel" class="form-control">{{ __('Rentabilidade %') }}</label>

                                        <label for="totalExigivel" class="form-control">{{ __('Lucro Liquido / Ativo Total')}}</label>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="totalExigivel" class="form-control">{{ __('LL | AT') }}</label>

                                        <label for="totalExigivel" class="form-control">{{ __('0,00') }}</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
