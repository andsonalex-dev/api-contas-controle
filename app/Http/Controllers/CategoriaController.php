<?php

namespace App\Http\Controllers;

use App\Services\CategoriaService;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    protected $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index()
    {
        $categorias = $this->categoriaService->getAllCategorias();
        return response()->json($categorias);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $categoria = $this->categoriaService->create($data);
        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        $categoria = $this->categoriaService->findCategoriaById($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }
        return response()->json($categoria);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $categoria = $this->categoriaService->update($id, $data);
        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }
        return response()->json($categoria);
    }

    public function destroy($id)
    {
        $this->categoriaService->delete($id);
        return response()->json(null, 204);
    }
}
