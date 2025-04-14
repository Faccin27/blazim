<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\CkEditor;
use App\Http\Controllers\Admin\InicioController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MarcaController;
use App\Http\Controllers\Admin\PopupController;
use App\Http\Controllers\Admin\ProdutoController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', InicioController::class)->name('inicio')->middleware('auth');

/* Login */
Route::get('/entrar', [LoginController::class, 'index'])->name('login');
Route::post('/entrar', [LoginController::class, 'auth'])->name('auth');
Route::post('/esqueceu-senha', [LoginController::class, 'forgot'])->name('forgot');
Route::get('/sair', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

/* CKEDITOR */
Route::post('/ckeditor-upload', CkEditor::class);

/* Popup */
Route::get('/popup', [PopupController::class, 'index'])->name('popup')->middleware('auth');
Route::get('/popup/foto', [PopupController::class, 'foto'])->name('popup.foto')->middleware('auth');
Route::post('/popup', [PopupController::class, 'update'])->name('popup.update')->middleware('auth');
Route::post('/popup/foto', [PopupController::class, 'updateFoto'])->name('popup.updateFoto')->middleware('auth');

/* Site */
Route::get('/site', [SiteController::class, 'index'])->name('site')->middleware('auth');
Route::get('/site/head', [SiteController::class, 'head'])->name('site.head')->middleware('auth');
Route::get('/site/body', [SiteController::class, 'body'])->name('site.body')->middleware('auth');
Route::get('/site/footer', [SiteController::class, 'footer'])->name('site.footer')->middleware('auth');
Route::post('/site', [SiteController::class, 'update'])->name('site.update')->middleware('auth');
Route::post('/site/codigos', [SiteController::class, 'updateCodigos'])->name('site.updateCodigos')->middleware('auth');

/* Users */
Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth');
Route::get('/users/criar', [UserController::class, 'create'])->name('users.create')->middleware('auth')->can('create', App\Models\User::class);
Route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit')->middleware('auth')->can('update', 'user');
Route::get('/users/trocar-senha/{user}', [UserController::class, 'changePassword'])->name('users.change')->middleware('auth')->can('delete', 'user');

Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth')->can('create', App\Models\User::class);
Route::post('/users/alterar/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth')->can('update', 'user');
Route::post('/users/alterar-senha/{user}', [UserController::class, 'updatePassword'])->name('users.updatePassword')->middleware('auth')->can('update', 'user');
Route::post('/users/destruir/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth')->can('delete', 'user');

/* Banner */
Route::get('/banner', [BannerController::class, 'index'])->name('banner')->middleware('auth');
Route::get('/banner/criar', [BannerController::class, 'create'])->name('banner.create')->middleware('auth');
Route::get('/banner/{banner}', [BannerController::class, 'edit'])->name('banner.edit')->middleware('auth');
Route::get('/banner/fotos/{banner}', [BannerController::class, 'fotos'])->name('banner.fotos')->middleware('auth');

Route::post('/banner', [BannerController::class, 'store'])->name('banner.store')->middleware('auth');
Route::post('/banner/alterar/{banner}', [BannerController::class, 'update'])->name('banner.update')->middleware('auth');
Route::post('/banner/alterar-fotos/{banner}', [BannerController::class, 'updateFotos'])->name('banner.updateFotos')->middleware('auth');
Route::post('/banner/ordenar', [BannerController::class, 'order'])->name('banner.order')->middleware('auth');
Route::post('/banner/destruir/{banner}', [BannerController::class, 'destroy'])->name('banner.destroy')->middleware('auth');

/* Marca */
Route::get('/marca', [MarcaController::class, 'index'])->name('marca')->middleware('auth');
Route::get('/marca/criar', [MarcaController::class, 'create'])->name('marca.create')->middleware('auth');
Route::get('/marca/{marca}', [MarcaController::class, 'edit'])->name('marca.edit')->middleware('auth');
Route::get('/marca/fotos/{marca}', [MarcaController::class, 'fotos'])->name('marca.fotos')->middleware('auth');

Route::post('/marca', [MarcaController::class, 'store'])->name('marca.store')->middleware('auth');
Route::post('/marca/alterar/{marca}', [MarcaController::class, 'update'])->name('marca.update')->middleware('auth');
Route::post('/marca/alterar-fotos/{marca}', [MarcaController::class, 'updateFotos'])->name('marca.updateFotos')->middleware('auth');
Route::post('/marca/ordenar', [MarcaController::class, 'order'])->name('marca.order')->middleware('auth');
Route::post('/marca/destruir/{marca}', [MarcaController::class, 'destroy'])->name('marca.destroy')->middleware('auth');

/* Categoria */
Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria')->middleware('auth');
Route::get('/categoria/criar', [CategoriaController::class, 'create'])->name('categoria.create')->middleware('auth');
Route::get('/categoria/{categoria}', [CategoriaController::class, 'edit'])->name('categoria.edit')->middleware('auth');

Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store')->middleware('auth');
Route::post('/categoria/alterar/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update')->middleware('auth');
Route::post('/categoria/ordenar', [CategoriaController::class, 'order'])->name('categoria.order')->middleware('auth');
Route::post('/categoria/destruir/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.destroy')->middleware('auth');
/* Produto */
Route::get('/produto', [ProdutoController::class, 'index'])->name('produto')->middleware('auth');
Route::get('/produto/ajax-categorias', [ProdutoController::class, 'ajaxCategoria'])->name('produto.ajaxCategoria')->middleware('auth');
Route::get('/produto/criar', [ProdutoController::class, 'create'])->name('produto.create')->middleware('auth');
Route::get('/produto/{produto}', [ProdutoController::class, 'edit'])->name('produto.edit')->middleware('auth');
Route::get('/produto/fotos/{produto}', [ProdutoController::class, 'fotos'])->name('produto.fotos')->middleware('auth');

Route::post('/produto', [ProdutoController::class, 'store'])->name('produto.store')->middleware('auth');
Route::post('/produto/alterar/{produto}', [ProdutoController::class, 'update'])->name('produto.update')->middleware('auth');
Route::post('/produto/alterar-fotos/{produto}', [ProdutoController::class, 'updateFotos'])->name('produto.updateFotos')->middleware('auth');
Route::post('/produto/ordenar', [ProdutoController::class, 'order'])->name('produto.order')->middleware('auth');
Route::post('/produto/ordenar-fotos', [ProdutoController::class, 'orderProdutoFoto'])->name('produto.orderProdutoFoto')->middleware('auth');
Route::post('/produto/destruir-fotos/{produto}', [ProdutoController::class, 'destroyAllProdutoFoto'])->name('produto.destroyAllProdutoFoto')->middleware('auth');
Route::post('/produto/destruir-foto/{produtoFoto}', [ProdutoController::class, 'destroyProdutoFoto'])->name('produto.destroyProdutoFoto')->middleware('auth');
Route::post('/produto/destruir/{produto}', [ProdutoController::class, 'destroy'])->name('produto.destroy')->middleware('auth');
