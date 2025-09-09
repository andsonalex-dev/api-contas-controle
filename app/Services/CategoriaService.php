<?php

namespace App\Services;
use App\Repositories\CategoriaRepository;

class CategoriaService
{
    public function __construct(protected CategoriaRepository $categoriaRepository) {}

    public function getAllCategorias()
    {
        return $this->categoriaRepository->getAllCategorias();
    }

    public function create(array $data)
    {
        return $this->categoriaRepository->createCategoria($data);
    }

    public function findCategoriaById($id)
    {
        return $this->categoriaRepository->findCategoriaById($id);
    }

    public function update($id, array $data)
    {
        return $this->categoriaRepository->updateCategoria($id, $data);
    }

    public function delete($id)
    {
        return $this->categoriaRepository->deleteCategoria($id);
    }
}
