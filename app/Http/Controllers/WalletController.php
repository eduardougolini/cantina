<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

/**
 * Description of WalletController
 *
 * @author eduardo
 */
class WalletController extends Controller{
    
    private $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    public function showWallet(){
        $user = Auth::user();

        return view('wallet', ['user' => $user]);

    }
}
