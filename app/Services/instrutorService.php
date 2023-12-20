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

   





}
