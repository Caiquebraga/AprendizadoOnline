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

    public function criaCurso (Request $request)
    {
            try{
            $dados = $request->all();

            $inscricao = $this->cursoService->criarCurso($dados);

            return response()->json(['message' => 'Curso Criado com Sucessso', 'curso'=> $inscricao], 201);

            } catch (\InvalidArgumentException $e){
            return response()->json(['error' => $e->getMessage()]. 400);
            }  catch (\RuntimeException $e) {
                return response()->json(['error' => $e->getMessage(), 409]);
            } catch (\Exception $e){
                return response()->json(['error' => 'Ocorreu um erro ao criar o curso'], 500);
            }
    }
}
