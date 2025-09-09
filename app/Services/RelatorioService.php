<?php

namespace App\Services;

use App\Repositories\ContaRepository;

class RelatorioService
{
    public function __construct(
        protected ContaRepository $contaRepository
    ) {}

    public function gerarRelatorio()
    {
        $resultados = [];

        $contas = $this->contaRepository->relatorioProjecaoPagamento();

        foreach ($contas as $conta) {
            foreach ($conta->projecoes as $proj) {
                $pagamento = $conta->pagamentos->where('mes', $proj->mes)->first();

                $valorPago = $pagamento->valor_pago ?? 0;
                $diferenca = $valorPago - $proj->valor_estimado;

                $resultados[] = [
                    'conta' => $conta->nome,
                    'mes' => $proj->mes,
                    'valor_estimado' => $proj->valor_estimado,
                    'valor_pago' => $valorPago,
                    'diferenca' => $diferenca
                ];
            }
        }
        
        return $resultados;
    }
}
