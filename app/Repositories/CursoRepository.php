<?php


namespace App\Repositories;

use App\Models\Curso;

class CursoRepository {

    protected $model;

    public function __construct(Curso $model)
    {
        $this->model = $model;
    }

    public function buscarcurso($id)
    {
        return $this->model->with('instrutor')->find($id);
    }

    public function listacursos()
    {
        return $this->model->with('instrutor')->get();
    }

    public function criacurso(array $dados)
    {
        return $this->model->create($dados);

    }

    public function editacurso($id, array $dados)
    {
    
        return $this->model->where('id', $id)->update($dados);

    }
}
