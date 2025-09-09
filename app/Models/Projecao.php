<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecao extends Model
{
    use HasFactory;
    protected $table = 'projecoes';
    protected $fillable = ['conta_id', 'mes', 'valor_estimado'];

    public function conta()
    {
        return $this->belongsTo(Conta::class);
    }
}
