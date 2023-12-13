<?php

namespace App\Repositories;

use App\Models\Licao;

class LicaoRepository
{
    protected $licaoModel;

    public function __construct(Licao $licaoModel)
    {
        $this->licaoModel=$licaoModel;
    }




}