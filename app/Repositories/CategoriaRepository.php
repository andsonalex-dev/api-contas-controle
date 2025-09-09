<?php

namespace App\Repositories;

use App\Models\Categoria;

class CategoriaRepository
{
    public function getAllCategorias()
    {
        return Categoria::all();
    }

    public function findCategoriaById($id)
    {
        return Categoria::findOrFail($id);
    }

    public function createCategoria(array $data)
    {
        return Categoria::create($data);
    }

    public function updateCategoria($id, array $data)
    {
        $categoria = $this->findCategoriaById($id);
        $categoria->update($data);
        return $categoria;
    }

    public function deleteCategoria($id)
    {
        $categoria = $this->findCategoriaById($id);
        $categoria->delete();
        return $categoria;
    }
}
