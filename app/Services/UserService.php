<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Response as HttpResponse;

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

}