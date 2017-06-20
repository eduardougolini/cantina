<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Entities\Product;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

/**
 * Description of PaymentsController
 *
 * @author eduardo
 */
class PaymentsController extends Controller {
    
    public function renderPaymentsView() {
        $user = Auth::user();
        
        return view('payments', ['user' => $user, 'payments' => []]);
    }
    
}
