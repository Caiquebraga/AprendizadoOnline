<?php

namespace App\Services;

use App\Repositories\CursoRepository;


class CursoService 
{

    public function atualizarCurso($id, array $dados)
    {
        //verificando se curso existe 
        $curso = $this->cursoRepository->buscarcurso($id);

        if($curso)
        {
            $resultado = $this->cursoRepository->atualizarCurso($id, $dados);

            if($resultado)
            {
                return ['sucess'=> 'Curso Atualizado com sucesso'];
            } else {
                return ['error' => 'falha na atualização do curso'];
            }
        } else{
            return ['error' => 'O curso não foi encontrado'];
        }
    }

}