<?php

namespace App\Services;

use App\Repositories\LicaoRepository;
use Illuminate\Support\Facades\Validator;
use App\Models\Licao;



class LicaoService {


    protected $licaoRepository;

    public function __construct(licaoRepository $licaoRepository)
    
        {
        $this->licaoRepository = $licaoRepository;
        }
    
        public function GetLicao()
        {
            return $this->licaoRepository->all();
        }

        public function CreateLicao(array $dados)
        {
           $rules = [
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
            'curso_id' => 'required|exists:cursos,id',
            'type' => 'nullable|string|max:20',
           ];

           $validate = validator::make($dados, $rules);

           if($validate->fails()){
            throw new \InvalidArgumentException($validate->errors()->first());
           }

           $newlesson = Licao::create($dados);

           return $newlesson;

        }

}