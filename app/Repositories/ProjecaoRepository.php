<?php

namespace App\Repositories;
use App\Models\Projecao;

class ProjecaoRepository
{
    public function getAllProjecoes()
    {
        return Projecao::all();
    }

    public function createProjecao(array $data)
    {
        return Projecao::create($data);
    }

    public function findProjecaoById($id)
    {
        return Projecao::find($id);
    }

    public function updateProjecao($id, array $data)
    {
        $projecao = Projecao::find($id);
        $projecao->update($data);
        return $projecao;
    }

    public function deleteProjecao($id)
    {
        $projecao = Projecao::find($id);
        return $projecao->delete();
    }
}
