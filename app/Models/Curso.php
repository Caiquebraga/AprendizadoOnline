<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'instrutor_id',
    ];

    public function instrutor()
    {
        return $this->belongsTo(Instrutor::class, 'instrutor_id');
    }
}
