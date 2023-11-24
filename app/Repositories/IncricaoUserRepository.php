<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Inscricao;

class InscricaoUserRepository
{
    public function criarInscricao(array $dados)
    {

        return inscricao::create($dados);

    }

    public function atualizaInscricao(Inscricao $inscricao, array $dados)
    {
        $inscricao->update($dados);
        return $inscricao;
    }

    public function excluirInscricao(Inscricao $inscricao)

    {

        $inscricao->delete();
    }


    public function obterInscricaoPorId($id)
    {
        return Inscricao::find($id);
    }
    

}