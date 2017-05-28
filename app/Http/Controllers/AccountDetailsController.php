<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Doctrine\ORM\EntityManager;

class AccountDetailsController extends Controller {
    
    private $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function showDetails()
    {
        $user = Auth::user();

        $userInfo = $this->em->createQuery(
                "SELECT p "
                . "FROM Cantina:Users u "
                . "JOIN Cantina:Person p "
                    . "WITH p.id = u.person "
                . "WHERE u = :userId"
            )->setParameter('userId', $user->id)
            ->getOneOrNullResult();
        
        return view('accountDetails', ['user' => $userInfo]);
        
        
    }
}