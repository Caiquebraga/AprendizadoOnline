<?php

namespace App\Repositories;

use App\Models\Inscricao;

class InscricaoUserRepository
{
    protected $inscricao;

    public function __construct(Inscricao $inscricaoModel)
    {
        $this->inscricao = $inscricaoModel;       
    }

    public function obterInscricaoPorId($id)
    {
        return $this->inscricao->find($id);
    }

    public function criarInscricao(array $dados)
    {
        return $this->inscricao->create($dados);
    }

    public function atualizarInscricao($id, array $dados)
    {
        return $this->inscricao->update($dados);
    }

    public function excluirInscricao($id)
    {
        return $this->inscricao->delete($id);
    }
}
