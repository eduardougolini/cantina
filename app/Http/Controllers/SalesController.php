<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Description of SalesController
 *
 * @author eduardo
 */
class SalesController extends Controller {
    
    public function registerSaleView() {
        $user = Auth::user();
        return view('registerSales', ['user' => $user]);
    }
    
}
