<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


/**
 * Description of LogoutController
 *
 * @author eduardo
 */
class LogoutController extends Controller {

    public function logoutUser() {
        Auth::logout();
        
        return redirect()->route('login');
    }
}
