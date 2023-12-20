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


    public function getLicao()
    {
       return $this->licaoModel->all();
    }

    public function createLicao(array $licaodata)
    {

        return $this->licaoModel->create($licaodata);
    }
    
    public function updateLicao(array $licaoarray)
    {
        $licao = $this->licaoModel->find($licaoarray['id']);

        $licao->update($licaoarray);
        return $licao;
    }

    public function deleteLicao()
    {
        $this->licaoModel->delete();
    }

    

}