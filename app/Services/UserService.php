<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Validator;

class Userservice 
{
    protected $userservice;

    public function __construct(UserReposiroty $userRepository) {
        
        $this->UserRepository = $userRepository;
    }

    public function getallUser()
    {
        $user = $this->UserRepository->getUser();

        return [
           'user' => $user,
           'status' => Response::HTTP_OK
        ];
    }

    public function createUser(array $userData)
    {
        $rules = [
            'nome' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users',
            'senha' => 'required|string|min:8|max:255|confirmed',
        ];

        $messages = [
            'nome.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'senha' => 'O campo senha deve ter no minino 8 digitos.',
        ];

          // Execute a validação
          $validator = Validator::make($userData, $rules, $messages);

          // Verifique se a validação falhou
          if ($validator->fails()) {
              return redirect('register')
                          ->withErrors($validator)
                          ->withInput();
          }
        
        $user = $this->userRepository->create($userData);
        return $user;
    }


    public function updateUser(array $userData)
    {
        $updatedUser = $this->userRepository->updateUser($userData);

        return $updatedUser;
    }

    
    public function deleteUser()
    {
       $deleteUser = $this->UserRepository->deleteUser();     
    }


}