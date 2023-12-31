<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licao extends Model
{
    protected $fillable = [
       'titulo',
       'conteudo',
       'type'
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
