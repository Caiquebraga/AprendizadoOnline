<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\cursoService;


class CursoController extends Controller
{

    protected $cursoService;

    public function __construct(cursoService $cursoService)
    {
        $this->cursoService = $cursoService;
    }
}
