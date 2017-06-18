<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Doctrine\ORM\EntityManager;

/**
 * Description of SalesController
 *
 * @author eduardo
 */
class SalesController extends Controller {
    
    private $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    public function registerSaleView() {
        $user = Auth::user();

        $products = $this->em->createQuery(
                "SELECT p.id, p.name "
                . "FROM Cantina:Product p "
            )->getResult();
        
        $clients = $this->em->createQuery(
                'SELECT c.id, p.name '
                . 'FROM Cantina:Client c '
                . 'JOIN Cantina:Person p '
                    . 'WITH c.person = p'
                )->getResult();
        
        return view('registerSales', ['user' => $user, 'products' => $products, 'clients' => $clients]);
    }
}
