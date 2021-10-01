@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-md-center">{{ __('Cotações') }}</div>
                    <form method="POST" action="cotacao">
                        <div class="card-body">

                                @csrf
                            <div class="card-body row">
                                <div class="col-sm-12 card-header">{{ __('Calculador - Ciclo') }}</div>

                            </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                    <label for="inicio" class="col-form-label text-md-right">{{ __('Inicio') }}</label>
                                        <input id="inicio" type="date" class="form-control @error('inicio') is-invalid @enderror" name="inicio" autofocus>
                                    </div>

                                    <div class="col-md-4">
                                    <label for="Termino" class="col-form-label text-md-right">{{ __('Termino') }}</label>

                                        <input id="termino" type="date" class="form-control @error('termino') is-invalid @enderror" name="termino" autofocus>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="periodoemdias" class=" col-form-label text-md-right">{{ __('Periodo em dias') }}</label>
                                        <input id="periodoemdias" type="text" class="form-control @error('periodoemdias') is-invalid @enderror" name="periodoemdias" autofocus>
                                    </div>
                                </div>


                                <div class="card-body row">
                                    <div class="col-sm-6 card-header">{{ __('Valores') }}</div>
                                    <div class="col-sm-6 card-header">{{ __('Oscilações') }}</div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <label for="dolar" class="col-form-label text-md-right">{{ __('Dolar U$') }}</label>

                                        <input id="dolar" type="text" class="form-control @error('dolar') is-invalid @enderror" name="dolar" autofocus>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="oscilacoes" class="col-form-label text-md-right">{{ __('Oscilações') }}</label>

                                        <input id="oscilacoes" type="text" class="form-control @error('oscilacoes') is-invalid @enderror" name="oscilacoes" autofocus>
                                    </div>
                                </div>



                                <div class="card-body row">
                                    <div class="col-sm-8 card-header">{{ __('Cereais') }}</div>
                                    <div class="col-sm-4 card-header">{{ __('Oscilações') }}</div>
                                </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="cereal" class="form-control col-form-label">{{ __('Arroz') }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="cereal" class="col-form-label text-md-right">{{ __('Saca') }}</label>

                                    <label for="cereal" class="col-form-label form-control">{{ __('Padrão Industria') }}</label>
                                </div>

                                <div class="col-md-2">
                                    <label for="precomediosaca" class="col-form-label text-md-right">{{ __('Preço Médio Saca') }}</label>

                                    <input id="precomediosaca" type="text" class="form-control @error('precomediosaca') is-invalid @enderror" name="precomediosaca" autofocus>
                                </div>

                                <div class="col-md-2">
                                    <label for="precomediokilo" class="col-form-label text-md-right">{{ __('Preço Médio Quilo') }}</label>

                                    <input id="precomediokilo" type="text" class="form-control @error('precomediokilo') is-invalid @enderror" name="precomediokilo" autofocus>
                                </div>

                                <div class="col-md-2">
                                    <label for="oscilacao1" class="col-form-label text-md-right">{{ __('5,0%') }}</label>

                                    <input id="oscilacao1" type="text" class="form-control @error('oscilacao1') is-invalid @enderror" name="oscilacao1" autofocus>
                                </div>

                                <div class="col-md-2">
                                    <label for="oscilacao2" class="col-form-label text-md-right">{{ __('-3,0%') }}</label>

                                    <input id="oscilacao2" type="text" class="form-control @error('oscilacao2') is-invalid @enderror" name="oscilacao2" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="cereal" class="col-form-label form-control">{{ __('Peso Saca Kgs') }}</label>
                                </div>

                                <div class="col-md-4">
                                    <input id="pesosacakgs" type="text" class="form-control @error('pesosacakgs') is-invalid @enderror" name="pesosacakgs" autofocus>
                                </div>
                            </div>


                            <div class="card-body row">
                                <div class="col-sm-12 card-header">{{ __('Terra Nua') }} </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="valorHectare" class="col-form-label text-md-right">{{ __('Valor Hectare para Venda em:') }}</label> <br>
                                    <label for="valorHectare" class="col-form-label text-md-right">{{ __('R$') }}</label>

                                </div>

                                <div class="col-md-2">
                                    <label for="oscilacao2" class="col-form-label text-md-right">{{ __('Arroz') }}</label>

                                    <input id="valorHectare" type="text" class="form-control @error('valorHectare') is-invalid @enderror" name="valorHectare" autofocus>                            </div>
                                </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="valorsacas" class="col-form-label text-md-right">{{ __('Sacas') }}</label>
                                </div>

                                <div class="col-md-2">
                                    <input id="valorSaca" type="text" class="form-control @error('valorSaca') is-invalid @enderror" name="valorSaca" autofocus>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
