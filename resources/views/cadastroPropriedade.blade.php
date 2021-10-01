@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cadastrar Propriedade') }}</div>

                    <div class="card-body">
                        <form method="POST" action="cadastrarPropriedade">
                            @csrf
                            <div class="form-group row">
                                <label for="nomePro" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Proprietário') }}</label>

                                <div class="col-md-6">
                                    <input id="nomePro" type="text" class="form-control @error('nomePro') is-invalid @enderror" name="nomePro" value="" required autocomplete="nomePro" autofocus>

                                    @error('nomePro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cpfPro" class="col-md-4 col-form-label text-md-right">{{ __('CPF do Proprietário') }}</label>

                                <div class="col-md-6">
                                    <input id="cpfPro" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">

                                    @error('cpfPro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="propriedade" class="col-md-4 col-form-label text-md-right">{{ __('Propriedade') }}</label>

                                <div class="col-md-6">
                                    <input id="propriedade" type="text" class="form-control @error('propriedade') is-invalid @enderror" name="propriedade" value="" required autocomplete="propriedade" autofocus>

                                    @error('propriedade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>




                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Cadastrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
