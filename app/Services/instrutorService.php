<?php

namespace App\Services;

use App\Repositories\InstrutorRepository;
use Illuminate\Support\Facades\Validator;

class InstrutorService {

protected $instrutorRepository;

public function __construct(InstrutorRepository $instrutorRepository)

    {
    $this->InstrutorRepository = $InstrutorRepository;
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
    
        public function listaInstrutor()
        {
           $instrutores = $this->instrutorRepository->listainstrutor();    
        }
    

   





}
