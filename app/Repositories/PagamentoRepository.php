<?php

namespace App\Repositories;

use App\Models\Pagamento;

class PagamentoRepository
{
    public function getAllPagamentos()
    {
        return Pagamento::all();
    }

    public function createPagamento(array $data)
    {
        return Pagamento::create($data);
    }

    public function findPagamentoById($id)
    {
        return Pagamento::with('conta')->find($id);
    }

    public function updatePagamento($id, array $data)
    {
        $pagamento = Pagamento::with('conta')->find($id);
        $pagamento->update($data);
        return $pagamento;
    }

    public function deletePagamento($id)
    {
        $pagamento = Pagamento::find($id);
        return $pagamento->delete();
    }
}
