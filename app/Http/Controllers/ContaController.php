<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;
use App\Services\ContaService;

class ContaController extends Controller
{
    protected $contaService;

    public function __construct(ContaService $contaService)
    {
        $this->contaService = $contaService;
    }

    public function index()
    {
        return $this->contaService->getAllContas();
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'tipo' => 'required|string|max:100',
                'descricao' => 'nullable|string',
                'instituicao' => 'required|string|max:255',
                'categoria_id' => 'nullable|exists:categorias,id'
            ]);

            $conta = $this->contaService->create($request->only('nome', 'tipo', 'descricao', 'instituicao', 'categoria_id'));

            return response()->json($conta, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar conta', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        return $this->contaService->findContaById($id);
    }

    public function update(Request $request, $id)
    {
        $conta = $this->contaService->update($id, $request->only('nome', 'tipo', 'descricao', 'instituicao'));

        return response()->json($conta);
    }

    public function destroy($id)
    {
        $this->contaService->delete($id);

        return response()->json(null, 204);
    }
}
