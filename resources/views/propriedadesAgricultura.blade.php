@extends('layouts.app')

@section('content')
    <div class="form-group row">
        <div class="col-md-10">
            <h1 class="page-header"> Propriedades</h1>
        </div>
        <div class="col-md-2">
            <form method="GET" action="cadastrarPropriedade">
            <button type="submit" class="btn btn-primary">Nova Propriedade</button>
            </form>
        </div>

        <div class="col-md 12">
            <table class="table table-striped">
                <tr>
                    <th>CPF do Proprietario</th>
                    <th>Nome do Proprietario</th>
                    <th>Propriedade</th>
                    <th>Ação</th>
                </tr>
                <tr>
                    <form method="GET" action="cotacoes">
                        <td>04221461020</td>
                        <td>Proprietario1</td>
                        <td>Propriedade1</td>
                        <td><button type="submit" class="btn btn-primary">Simular</button></td>
                    </form>
                </tr>

            </table>
        </div>
    </div>
@endsection
