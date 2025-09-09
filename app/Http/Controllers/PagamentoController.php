<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;
use App\Services\PagamentoService;

class PagamentoController extends Controller
{
    protected $pagamentoService;

    public function __construct(PagamentoService $pagamentoService)
    {
        $this->pagamentoService = $pagamentoService;
    }

    public function index()
    {
        return $this->pagamentoService->getAllPagamentos();
    }

    public function store(Request $request)
    {
        $request->validate([
            'conta_id' => 'required|exists:contas,id',
            'mes' => 'required|string',
            'valor_pago' => 'required|numeric',
        ]);

        $pagamento = $this->pagamentoService->create($request->all());

        return response()->json($pagamento, 201);
    }

    public function show($id)
    {
        return $this->pagamentoService->findPagamentoById($id);
    }

    public function update(Request $request, $id)
    {
        $pagamento = $this->pagamentoService->update($id, $request->only('mes', 'valor_pago'));

        return response()->json($pagamento);
    }

    public function destroy($id)
    {
        $this->pagamentoService->delete($id);
        return response()->json(null, 204);
    }
}
