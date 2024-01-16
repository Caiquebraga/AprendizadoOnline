<?php

namespace App\Services;

use App\Repositories\LicaoRepository;
use Illuminate\Support\Facades\Validator;



class LicaoService {


    protected $licaoRepository;

    public function __construct(licaoRepository $licaoRepository)
    
        {
        $this->licaoRepository = $licaoRepository;
        
        }
    

}