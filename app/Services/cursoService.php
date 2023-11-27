<?php


namespace App\Services;

use App\Repositories\CursoRepository;
use Illuminate\Support\Facades\Validator;

class CursoService {

    protected $cursoRepository;

    public function __construct(CursoRepository $cursoRepository)
    {
        $this->CursoRepository = $cursoRepository;
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

        return $cursoCriado;
    }

    public function buscarInscricao($id)
    {
        
         $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|gt:0',
        ]);

    
        if ($validator->fails()) {
            throw new \InvalidArgumentException('ID inválido. Deve ser um número inteiro positivo.');
        }

        return $this->cursoRepository->buscacurso($id);
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

        $cursoExistente = $this->CursoRepositry->buscacurso($id);

        if (!$cursoExistente) {
            throw new \RuntimeException('Curso não encontrado.');
        }

        $this->cursoRepository->editacurso($id, $dados);

        return $this->cursoRepository->buscacurso($id);
    }
}