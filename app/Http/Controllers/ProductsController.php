<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller {
    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function registerProductView() {
        $user = Auth::user();
        return view('registerProduct', ['user' => $user]);
    }
}