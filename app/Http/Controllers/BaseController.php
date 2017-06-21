<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Doctrine\ORM\EntityManager;

class BaseController extends Controller {
    
    private $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function home() {
        $user = Auth::user();
        return view('home', ['user' => $user]);
    }
}