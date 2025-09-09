<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;
    protected $table = 'contas';
    public $timestamps = true;

    protected $fillable = [
        'nome',
        'tipo',
        'descricao',
        'instituicao'
    ];

    public function projecoes()
    {
        return $this->hasMany(Projecao::class);
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }
}
