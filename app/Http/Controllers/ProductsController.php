<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Entities\Product;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class ProductsController extends Controller {
    
    private $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function registerProductView() {
        $user = Auth::user();
        
        $providers = $this->em->getRepository('Cantina:Provider')->findAll();
        
        return view('registerProduct', [
            'user' => $user, 
            'providers' => $providers
        ]);
    }   
    
    public function registerNewProduct(Request $request) {
        $name = $request->get('name');
        $description = $request->get('description');
        $value = $request->get('value');
        
        $product = new Product();
        $product->setName($name);
        $product->setDescription($description);
        $product->setValue($value);
        
        $this->em->persist($product);
        $this->em->flush();
    }
}