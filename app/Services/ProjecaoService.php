<?php

namespace App\Services;

use App\Repositories\ProjecaoRepository;

class ProjecaoService
{
    public function __construct(protected ProjecaoRepository $projecaoRepository) {}

    public function getAllProjecoes()
    {
        return $this->projecaoRepository->getAllProjecoes();
    }

    public function create(array $data)
    {
        return $this->projecaoRepository->createProjecao($data);
    }

    public function findProjecaoById($id)
    {
        return $this->projecaoRepository->findProjecaoById($id);
    }

    public function update($id, array $data)
    {
        return $this->projecaoRepository->updateProjecao($id, $data);
    }

    public function delete($id)
    {
        return $this->projecaoRepository->deleteProjecao($id);
    }
}
