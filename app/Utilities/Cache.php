<?php

namespace App\Utilities;

class Cache
{
    private $dadosCache = [];

    public function temChave ($chave)
    {
        return isset($this->dadosCache[$chave]) && !$this->chaveExpirou($chave);

    }

    public function get($chave)
    {
        if ($this->temChave($chave)) {
            return $this->dadosCache[$chave]['valor'];
        }
        return null;
    }

    public function put($chave, $dados, $tempoExpiracao)
    {
        $this->dadosCache[$chave] = [
            'valor' => $dados,
            'expiracao' => time() + $tempoExpiracao,
        ];
    }


    private function chaveExpirou($chave)
    {
        if (isset($this->dadosCache[$chave]['expiracao'])) {
            return time() > $this->dadosCache[$chave]['expiracao'];
        }
        return false;
    }
}


