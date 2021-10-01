<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <script src="{{ asset('js/app.js') }}" async defer></script>
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">

</head>
<body>
<div id="app">
    <template-padrao></template-padrao>
    <template-usuario></template-usuario>
    <selecao></selecao>
</div>
</body>
</html>
