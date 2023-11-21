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

    public function cursos()
    {
        return $this->belongsTo(Cursos::class);
    }
}
