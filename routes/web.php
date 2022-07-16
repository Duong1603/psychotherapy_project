<?php
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/create', [PostController::class, 'create']);
Route::post('/store', [PostController::class, 'store']);
Route::get('{id}/edit', [PostController::class, "edit"]);
Route::post('/update/{id}', [PostController::class, "update"]);
Route::get('/delete/{id}', [PostController::class, "destroy"]);

Route::resource('posts',Postcontroller::class);

// Route::get('post', [PostController::class, 'index'])-> name ("post.index");
Route::get('/', function () {
    return view('showPost');
});



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
// Route::get('/', function () {
//     return view('welcome');
// });




