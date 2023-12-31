<?php


namespace App\Repositories;

use App\Models\Curso;
use App\Models\Instrutor;

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

    public function criacurso(array $dados)
    {
        return $this->model->create($dados);

    }

    public function editacurso($id, array $dados)
    {
    
        return $this->model->where('id', $id)->update($dados);

    }

    public function cursoJaExiste($nome)
    {
    return $this->model->where('nome', $nome)->exists();
    }
}
