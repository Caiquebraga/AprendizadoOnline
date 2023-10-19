<?php


namespace App\Repositories;

use App\Models\Curso;

class CursoRepository {

    protected $model;

    public function __construct(Curso $model)
    {
        $this->model = $model;
    }

    public function buscacurso($id)
    {
        return $this->model->with('instrutor')->find($id);
    }

    public function listacursos()
    {
        return $this->model->with('instrutor')->get();
    }
}
