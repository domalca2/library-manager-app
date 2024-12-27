<?php
header( "Access-Control-Allow-Origin: *" );
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::get('/libros', [ApiController::class, 'index']);  //ruta a la funcion de peti.
Route::post('/libros', [ApiController::class, 'store']);  //ruta a la funcion de insertar libro
Route::delete('/libros/{id}', [ApiController::class, 'destroy']);

// Rutas protegidas con autentificacion
Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/user', [AuthController::class, 'user']); // Obtiene inf
    Route::post('/logout', [AuthController::class, 'logout']); // Cerrar sesion
});
// para cuando se trabaje con vue ???
Route::post('/login', [AuthController::class, 'login'])->name('login'); //name('login') da nombre a la ruta para su ident
Route::get('/login', [AuthController::class, 'login'])->name('login');
