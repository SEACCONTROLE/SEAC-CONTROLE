<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\firestoreconnect;
use App\Http\Controllers\Orcamento;
use App\Http\Controllers\Propriedades;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Cotacoes;
use App\Http\Controllers\CulturasController;
use App\Http\Controllers\Ciclo;
use \App\Http\Controllers\Pensamento;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post("propriedade", [Propriedades::class, 'index']);
Route::post("cadastrarPropriedade", [Propriedades::class, 'cadastrar']);
Route::post("user", [firestoreconnect::class, 'signIn']);
Route::post("cadastrar", [firestoreconnect::class, 'cadastrar']);
Route::post("controllerorcamento", [Orcamento::class, 'index']);
Route::view("teste", "teste");
//Route::view("cotacoes", "cotacoes");
Route::view("planejamento", "planejamentoEstrategico");
Route::view("balanco", "balancoPatrimonial");
//Route::view("pensamento", "pensamentoEstrategico");
Route::view("simulador", "simulador");
Route::view("agricultura", "propriedadesAgricultura");
Route::view("cadastrarPropriedade", "cadastroPropriedade");


Route::get('register', 'firestoreconnect@signUp');
Route::post('user', 'firestoreconnect@signIn');
Route::get('check', 'firestoreconnect@userCheck');






Route::get('/{any?}', function (){
    return view('home');
})->where('any', '.*')->name('home'); ;



Route::get('/', function () {
    return view('welcome');
});

Route::post("user", [firestoreconnect::class, 'signIn']);

Route::post('homeSession', [firestoreconnect::class, 'checarUsuario']);

Route::post('SalvarCotacoes', [Cotacoes::class, 'salvar']);

Route::post('SalvarPensamento', [Pensamento::class, 'salvar']);


Route::post('culturas', [CulturasController::class, 'getCulturas']);

Route::post('propriedades', [Propriedades::class, 'getPropriedades']);

Route::post('iniciarCotacao', [Cotacoes::class, 'verificarPropriedade']);

Route::post('iniciarPensamento', [Ciclo::class, 'verificarCiclo']);

Route::post('cadastrarCiclo', [Ciclo::class, 'cadastrar']);

Route::post('ciclos', [Ciclo::class, 'getCiclos']);

Route::post('deletarCiclo', [Ciclo::class, 'deletar']);

Route::post("deletarPropriedade", [Propriedades::class, 'deletar']);

Route::post("editarPropriedade", [Propriedades::class, 'editar']);

Route::post('deletarCultura', [CulturasController::class, 'deletar']);

Route::post('editarCultura', [CulturasController::class, 'editar']);

Route::post('cadastrarCultura', [CulturasController::class, 'cadastrar']);

Route::post('sair', [firestoreconnect::class, 'signOut']);

Route::post('mandarPeso', [Cotacoes::class, 'salvarPeso']);

Route::post('getPrecoSaca', [Cotacoes::class, 'getPrecoSaca']);

Route::post('getPeso', [Cotacoes::class, 'getPeso']);

Route::post('verificarCotacaoCadastrada', [Cotacoes::class, 'verificarCotacaoCadastrada']);

Route::post('editarCotacao', [Cotacoes::class, 'editar']);

Route::post('getPensamentos', [Pensamento::class, 'getPensamentos']);















//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
  //  ->where('any','.*')->middleware('auth');

//Route::any('/home/{any?}',[App\Http\Controllers\HomeController::class, 'index'])
  //  ->where('any','.*')->middleware('auth');

//Route::any('/admin/{any?}',[App\Http\Controllers\HomeController::class, 'index'])
  //  ->
   // where('any','.*')->middleware('auth');



#Auth::routes();
#midle auth para verificar se esta logado
#olhar a documentação do laravel
#Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
#->where('any','.*')->middleware('auth');




#Route::get('/home', 'HomeController@index')->name('home');
