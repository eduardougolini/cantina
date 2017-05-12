<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Doctrine\ORM\EntityManager;
use App\Entities\Conta;

use LaravelDoctrine\ORM\Facades\EntityManager;

class BaseController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function home()
    {

        $conta = new Conta();
        $conta->setSaldo(50);
        
        EntityManager::persist($conta);
        EntityManager::flush();
        
        return $conta->getId();
    }
}