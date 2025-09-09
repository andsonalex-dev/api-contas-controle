<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    public $timestamps = true;

    protected $fillable = [
        'nome'
    ];

    public function contas()
    {
        return $this->hasMany(Conta::class);
    }
}
