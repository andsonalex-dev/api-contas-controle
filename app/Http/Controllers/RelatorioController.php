<?php

namespace App\Http\Controllers;

use App\Services\RelatorioService;
class RelatorioController extends Controller
{
    protected $relatorioService;

    public function __construct(RelatorioService $relatorioService)
    {
        $this->relatorioService = $relatorioService;
    }
    public function comparar()
    {
        $resultado = $this->relatorioService->gerarRelatorio();
        return response()->json($resultado);
    }
}
