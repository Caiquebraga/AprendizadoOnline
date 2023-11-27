<?php

namespace App\Services;

use App\Repositories\InscricaoUserRepository;
use Illuminate\Support\Facades\Validator;

class InscricaoService
{
    protected $inscricaoRepository; 

    public function __construct(InscricaoUserRepository $inscricaoRepository) {
        $this->inscricaoRepository = $inscricaoRepository; 
    }

    public function criarInscricao(array $dados) 
    {
        $inscricao = $this->inscricaoRepository->criarInscricao($dados); 
    }

    public function atualizarInscricao($inscricaoId, array $dados) 
    {
        $inscricao = $this->inscricaoRepository->obterInscricaoPorId($inscricaoId);
    
        if ($inscricao) {
            return $this->inscricaoRepository->atualizarInscricao($inscricao, $dados);
        } else {
            return $this->inscricaoRepository->criarInscricao($dados);
        }
    }
}
