<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\ProjecaoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\RelatorioController;
use \App\Http\Controllers\CategoriaController;

Route::apiResource('contas', ContaController::class);
Route::apiResource('projecoes', ProjecaoController::class);
Route::apiResource('pagamentos', PagamentoController::class);
Route::apiResource('categorias', CategoriaController::class);

// Relatório
Route::get('/relatorios/comparar', [RelatorioController::class, 'comparar']);
