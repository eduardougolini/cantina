<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller {
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