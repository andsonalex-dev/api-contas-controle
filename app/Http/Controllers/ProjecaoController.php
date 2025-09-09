<?php

namespace App\Http\Controllers;

use App\Models\Projecao;
use Illuminate\Http\Request;
use App\Services\ProjecaoService;

class ProjecaoController extends Controller
{
    protected $projecaoService;

    public function __construct(ProjecaoService $projecaoService)
    {
        $this->projecaoService = $projecaoService;
    }

    public function index()
    {
        return $this->projecaoService->getAllProjecoes();
    }

    public function store(Request $request)
    {
        $request->validate([
            'conta_id' => 'required|exists:contas,id',
            'mes' => 'required|string',
            'valor_estimado' => 'required|numeric',
        ]);

        $projecao = $this->projecaoService->create($request->all());

        return response()->json($projecao, 201);
    }

    public function show($id)
    {
        return $this->projecaoService->findProjecaoById($id);
    }

    public function update(Request $request, $id)
    {
         $request->validate([
            'mes' => 'required|string',
            'valor_estimado' => 'required|numeric',
        ]);

        $projecao= $this->projecaoService->update($id, $request->only('mes', 'valor_estimado'));

        return response()->json($projecao);
    }

    public function destroy($id)
    {
        $this->projecaoService->delete($id);
        return response()->json(null, 204);
    }
}
