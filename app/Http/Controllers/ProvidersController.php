<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Description of ProvidersController
 *
 * @author eduardo
 */
class ProvidersController extends Controller{
    
    public function registerProviderView() {
        $user = Auth::user();
        return view('registerProviders', ['user' => $user]);
    }
    
}
