<?php

namespace App\Services;

use App\Repositories\InstrutorRepository;
use Illuminate\Support\Facades\Validator;
use App\Utilities\Cache;


class InstrutorService {

protected $instrutorRepository;

public function __construct(InstrutorRepository $instrutorRepository)

    {
    $this->instrutorRepository = $instrutorRepository;
    }

    public function buscarInstrutor($id = null, $nome = null)
    {
        if(empty($id) && empty($nome))
        {
            throw new InvalidArgumentException('É necessário fornecer pelo menos o ID ou o nome do instrutor.');
        }  
        
        if(!empty($id))
        {
            $instrutor = $this->instrutorRepository->buscaInstrutor($id);

            if($instrutor === null){
                throw new InvalidArgumentException('Instrutor não encontrado pelo ID fornecido.');
            }

            return $instrutor;
        }

        if(!empty($nome))
        {
            $instrutores = $this->instrutorRepository->buscarInstrutoresPorNome($nome);
            if(empty($instrutores))
            {
                throw new InvalidArgumentException('Nenhum instrutor encontrado.');
            }

            return $instrutores;
        }
    }

    public function listainstrutor($usarCache = true)
{
    if ($usarCache) {
        
        $instrutoresCache = $this->cache->get('instrutores_cache');
        if ($instrutoresCache !== null && !$this->cache->chaveExpirou('instrutores_cache')) {
            return $instrutoresCache;
        }
    }

    try {
        
        $instrutores = $this->instrutorRepository->listainstrutor();
        
        
        $this->cache->put('instrutores_cache', $instrutores, 60);

        return $instrutores;
    } catch (Exception $excecao) {
       
        return [];
    }
}



   





}
