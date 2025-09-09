<?php

namespace App\Repositories;

use App\Models\Conta;
class ContaRepository
{
    public function getAllContas()
    {
        return Conta::all();
    }

    public function findContaById($id)
    {
        return Conta::findOrFail($id);
    }

    public function createConta(array $data)
    {
        return Conta::create($data);
    }

    public function updateConta($id, array $data)
    {
        $conta = $this->findContaById($id);
        $conta->update($data);
        return $conta;
    }

    public function deleteConta($id)
    {
        $conta = $this->findContaById($id);
        $conta->delete();
        return $conta;
    }

    public function relatorioProjecaoPagamento()
    {
        return conta::with(['projecoes', 'pagamentos'])->get();
    }
}
