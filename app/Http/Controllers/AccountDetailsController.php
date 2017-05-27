<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Doctrine\ORM\EntityManager;

class AccountDetailsController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function showDetails()
    {
        $user = Auth::user();

        $em = new EntityManager();
        $users = $em->createQuery(
                "SELECT * FROM users");
        
        return $users;
        
        
    }
}