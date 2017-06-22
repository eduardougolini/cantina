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

    /**
     * Responsável por deslogar o usuário do sistema
     * @return type
     */
    public function logoutUser() {
        Auth::logout();
        
        return redirect()->route('login');
    }
}
