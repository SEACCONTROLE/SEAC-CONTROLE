@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-md-center">{{ __('Planejamento Agricultura') }}</div>
                    <form method="POST" action="pensamentoEstrategico">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="calculador" class="col-form-label text-md-right">{{ __('Calculador') }}</label><br>
                                    <label for="ciclo" class="col-form-label text-md-right">{{ __('Ciclo') }}</label>
                                </div>

                                <div class="col-md-3">
                                    <label for="inicio" class="col-form-label text-md-right">{{ __('Inicio') }}</label>
                                    <input id="inicio" type="date" class="form-control @error('inicio') is-invalid @enderror" name="inicio" autofocus>
                                </div>

                                <div class="col-md-3">
                                    <label for="Termino" class="col-form-label text-md-right">{{ __('Termino') }}</label>

                                    <input id="termino" type="date" class="form-control @error('termino') is-invalid @enderror" name="termino" autofocus>
                                </div>
                                <div class="col-md-3">
                                    <label for="periodoemdias" class=" col-form-label text-md-right">{{ __('Periodo em dias') }}</label>
                                    <input id="periodoemdias" type="text" class="form-control @error('periodoemdias') is-invalid @enderror" name="periodoemdias" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">{{ __('Objetivos Operacionais') }}
                            <div class="card-header text-md-center">{{ __('Arroz') }}
                                <div class="card-body">
                                    <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="variedade" class="col-form-label text-md-right">{{ __('Cultivar - Variedade') }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="variedade" type="text" class="form-control @error('variedade') is-invalid @enderror" name="variedade" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="variedade" class="col-form-label text-md-right">{{ __('Cultivar - Variedade') }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="variedade" type="text" class="form-control @error('variedade') is-invalid @enderror" name="variedade" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="idTalhao" class="col-form-label text-md-right">{{ __('Identificação Talhão') }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="idTalhao" type="text" class="form-control @error('idTalhao') is-invalid @enderror" name="idTalhao" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="areaTalhao" class="col-form-label text-md-right">{{ __('Área Talhão/Há') }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="areaTalhao" type="text" class="form-control @error('areaTalhao') is-invalid @enderror" name="areaTalhao" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="areaDisponivel" class="col-form-label text-md-right">{{ __('Área Disponível Para Uso%') }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="areaDisponivel" type="text" class="form-control @error('areaDisponivel') is-invalid @enderror" name="areaDisponivel" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="areaRealUso" class="col-form-label text-md-right">{{ __('Área Realmente De Uso') }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="areaRealUso" type="text" class="form-control @error('areaRealUso') is-invalid @enderror" name="areaRealUso" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="estimativakgs" class="col-form-label text-md-right">{{ __('Estimativa De Kgs/Há') }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="estimativakgs" type="text" class="form-control @error('estimativakgs') is-invalid @enderror" name="estimativakgs" autofocus>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="pesoMedioSaca" class="col-form-label text-md-right">{{ __('Peso Médio Por Saca Em Kgs') }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="pesoMedioSaca" type="text" class="form-control @error('pesoMedioSaca') is-invalid @enderror" name="pesoMedioSaca" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="estimativaColheitakgs" class="col-form-label text-md-right">{{ __('Estimativa Colheita Em Kgs') }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="estimativaColheitakgs" type="text" class="form-control @error('estimativaColheitakgs') is-invalid @enderror" name="estimativaColheitakgs" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="estimativaColheitaSacas" class="col-form-label text-md-right">{{ __('Estimatima Colheita Scs/Ha') }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="estimativaColheitaSacas" type="text" class="form-control @error('estimativaColheitaSacas') is-invalid @enderror" name="estimativaColheitaSacas" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="estimativaColheitaTotalSacas" class="col-form-label text-md-right">{{ __('Estimativa Colheita Total Em Sacas') }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="estimativaColheitaTotalSacas" type="text" class="form-control @error('estimativaColheitaTotalSacas') is-invalid @enderror" name="estimativaColheitaTotalSacas" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="estimativaValorSaca" class="col-form-label text-md-right">{{ __('Estimativa Valor Saca R$') }}</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="estimativaValorSaca" type="text" class="form-control @error('estimativaValorSaca') is-invalid @enderror" name="estimativaValorSaca" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="card-header">{{ __('Receita') }}
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="receitaBrutaReal" class="col-form-label text-md-right">{{ __('Receita Bruta Em R$') }}</label>
                                            </div>

                                            <div class="col-md-3">
                                                <input id="receitaBrutaReal" type="text" class="form-control @error('receitaBrutaReal') is-invalid @enderror" name="receitaBrutaReal" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="receitaBrutaRealHa" class="col-form-label text-md-right">{{ __('Receita Bruta Em R$ Por Hectare') }}</label>
                                            </div>

                                            <div class="col-md-3">
                                                <input id="receitaBrutaRealHa" type="text" class="form-control @error('receitaBrutaRealHa') is-invalid @enderror" name="receitaBrutaRealHa" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="receitaBrutaDolar" class="col-form-label text-md-right">{{ __('Receita Bruta Em U$') }}</label>
                                            </div>

                                            <div class="col-md-3">
                                                <input id="receitaBrutaDolar" type="text" class="form-control @error('receitaBrutaDolar') is-invalid @enderror" name="receitaBrutaDolar" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="receitaBrutaDolarHa" class="col-form-label text-md-right">{{ __('Receita Bruta Em U$ Por Hectare') }}</label>
                                            </div>

                                            <div class="col-md-3">
                                                <input id="receitaBrutaDolarHa" type="text" class="form-control @error('receitaBrutaDolarHa') is-invalid @enderror" name="receitaBrutaDolarHa" autofocus>
                                            </div>
                                        </div>
                                    </div>
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
