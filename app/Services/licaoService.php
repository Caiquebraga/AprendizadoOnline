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

        public function updateLicao(array $licaoArray)
        {

            if (empty($licaoArray['titulo'])) {
                throw new InvalidArgumentException("O título da lição não pode estar vazio.");
            }

            if (empty($licaoArray['conteudo'])){
                throw new InvalidArgumentException("O conteudo da lição não pode esta vazio.");
            }

            $licaoatualiza = $this->licaoRepository->updateLicao($licaoArray);

            return $licaoatualiza;
        }


}