<?php

namespace App\Services;

use App\Repositories\InscricaoUserRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class InscricaoService
{
    protected $inscricaoRepository; 

    public function __construct(InscricaoUserRepository $inscricaoRepository) 
    {
        $this->inscricaoRepository = $inscricaoRepository; 
    }

    public function criarInscricao(array $dados) 
    {
        $validacao = validarDados($dados);

        if($validacao->fails()){
            throw new \InvalidArgumentException('Os dados fornecidos são inválidos: ' . $validacao->errors()->first());
        }
        $inscricao = $this->inscricaoRepository->criarInscricao($dados); 
    }

    public function validaDados(array $dados)
    {
        $regras = [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:inscricoes|email',
            'nome_curso' => 'required|string|max:255',
        ];
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

    public function obterInscricaoporId($id)
    {
        $inscricao = $this->inscricaoRepository->obterInscricaoporId($id);

        if(!$inscricao)
        {
            throw new \exception('Inscrição não encontrada!');
        }

        return $inscricao;
    }

    public function excluirInscricao(Inscricao $inscricao)
    {
        if(!$this->usuarioTemPermissao())
        {
            throw new \Exception('Você não tem permissão para excluir esta inscrição.');
        }

        $this->inscricaoRepository->excluirInscricao($inscricao);
    }

    public function usuarioTemPermissao()
    {
        $userAutenticado = auth::user();

        return $usuarioAutenticado && $usuarioAutenticado->perfil && $usuarioAutenticado->perfil->tipo === 'admin';
    }
}
