<?php

namespace App\Services;
use App\Repositories\ContaRepository;

class ContaService
{
    public function __construct(protected ContaRepository $contaRepository) {}

    public function getAllContas()
    {
        return $this->contaRepository->getAllContas();
    }

    public function create(array $data)
    {
        return $this->contaRepository->createConta($data);
    }

    public function findContaById($id)
    {
        return $this->contaRepository->findContaById($id);
    }

    public function update($id, array $data)
    {
        return $this->contaRepository->updateConta($id, $data);
    }

    public function delete($id)
    {
        return $this->contaRepository->deleteConta($id);
    }
}
