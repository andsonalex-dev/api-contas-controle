<?php

namespace App\Services;
use App\Repositories\PagamentoRepository;

class PagamentoService
{
    public function __construct(protected PagamentoRepository $pagamentoRepository) {}

    public function getAllPagamentos()
    {
        return $this->pagamentoRepository->getAllPagamentos();
    }

    public function create(array $data)
    {
        return $this->pagamentoRepository->createPagamento($data);
    }

    public function findPagamentoById($id)
    {
        return $this->pagamentoRepository->findPagamentoById($id);
    }

    public function update($id, array $data)
    {
        return $this->pagamentoRepository->updatePagamento($id, $data);
    }

    public function delete($id)
    {
        return $this->pagamentoRepository->deletePagamento($id);
    }
}
