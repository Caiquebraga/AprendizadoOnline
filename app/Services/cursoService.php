<?php


namespace App\Services;

use App\Repositories\CursoRepository;
use Illuminate\Support\Facades\Validator;

class CursoService {

    protected $CursoRepository;

    public function __construct(CursoRepository $CursoRepository)
    {
        $this->CursoRepository = $CursoRepository;
    }

    public function criarCurso(array $dados )
    {   

        $validator = Validator::make($dados, [
            'nome' => 'required|unique:cursos|max:255',
            'descricao' => 'required|max:500', 
            'instrutor_id' => 'required|exists:instrutores,id',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException('Dados inválidos: ' . $validator->errors()->first());
        }

        if ($this->CursoRepository->cursoJaExiste($dados['nome'])) {
            throw new \RuntimeException('Já existe um curso com esse nome.');
        }

        $inscricao = $this->CursoRepository->criacurso($dados);

        return $inscricao;
    }

    public function buscarCurso($id)
    {
        
         $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|gt:0',
        ]);

    
        if ($validator->fails()) {
            throw new \InvalidArgumentException('ID inválido. Deve ser um número inteiro positivo.');
        }

        return $this->CursoRepository->buscacurso($id);
    }

    public function editarCurso($id, array $dados)
    {
        $validator = Validator::make($dados, [
            'nome' => 'required|unique:cursos,nome,' . $id . '|max:255',
            'descricao' => 'required|max:500',
            'instrutor_id' => 'required|exists:instrutores,id',
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException('Dados inválidos: ' . $validator->errors()->first());
        }

        $cursoExistente = $this->CursoRepository->buscacurso($id);

        if (!$cursoExistente) {
            throw new \RuntimeException('Curso não encontrado.');
        }

        $this->CursoRepository->editacurso($id, $dados);

        return $this->CursoRepository->buscacurso($id);
    }
}