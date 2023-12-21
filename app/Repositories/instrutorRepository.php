<?php

namespace App\Repositories;

use App\Models\Instrutor;

class instrutorRepository {

    protected $model;

    public function __construct(Instrutor $model) {
        
        $this->model = $model;
    }


    public function buscaInstrutor($id)
    {
        return $this->model->with('user')->find($id);
    }

    public function listainstrutor()
    {
        return $this->model->with('user')->get();
    }

    public function buscarInstrutoresPorNome($nome)
    {
        return $this->model->with('user')->where('nome', 'LIKE', "%$nome%")->get();
    }

    public function criarinstrutor(array $dados)
    {
        return $this->model->create($dados);
    }

    public function editarinstrutor($id, array $dados)
    {
        return $this->model->where('id', $id)->update($dados);
    }

    public function deletarinstrutor($id)
    {
        return $this->model->where('id', $id)->delete();
    }













}