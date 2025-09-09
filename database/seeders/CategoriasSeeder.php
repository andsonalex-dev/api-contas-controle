<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Moradia',
            'Alimentação',
            'Vestuário',
            'Locomoção',
            'Trabalho',
            'Saúde',
            'Lazer',
            'Educação',
            'Investimentos',
            'Cartão de Crédito',
            'Imprevistos',
            'Poupança',
            'Transporte',
            'Assinaturas',
            'Doações',
            'Ajuda',
            'Presentes',
            'Viagens',
            'Cultura',
            'Tecnologia',
            'Esportes',
            'Animais',
            'Beleza',
            'Higiene',
            'Impostos',
            'Seguros',
            'Outros'
        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert([
                'nome' => $categoria,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
