<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\RepresentantesController;
use App\Http\Controllers\SobreController;
use Illuminate\Support\Facades\Route;

/* Home */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home2', [HomeController::class, 'home2'])->name('home2');
Route::get('/marcas', [HomeController::class, 'index'])->name('home.marcas');

/* Contato */
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');
Route::post('/contato', [ContatoController::class, 'enviar'])->name('contato.enviar');
Route::get('/trabalhe', [ContatoController::class, 'trabalhe'])->name('contato.trabalhe');

/* Sobre */
Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');

/* Clientes */
Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes');

/* Blog */
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog-detalhes', [BlogController::class, 'detalhes'])->name('blog.detalhes');

/* Produtos */
Route::get('/produtos', [ProdutosController::class, 'index'])->name('produtos');
Route::get('/produtos-detalhes', [ProdutosController::class, 'detalhes'])->name('produtos.detalhes');


// Representantes
Route::get('/representantes', [RepresentantesController::class, 'index'])->name('representantes');
