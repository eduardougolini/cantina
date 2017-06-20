<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use App\Entities\Sale;
use App\Entities\Transaction;

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
    
    public function registerNewSale(Request $request) {
        $clientId = $request->get('clientId');
        $inCash = $request->get('inCash');
        $paymentSlip = $request->get('paymentSlip');
        $productsList = $request->get('productsList');
        
        if ($inCash) {
            $type = 'DINHEIRO';
        } else if ($paymentSlip) {
            $type = 'DEBITO';
        }
        
        $sale = new Sale();
        $sale->setDate(new \DateTime());
        $sale->setType($type);
        $sale->setClient($this->em->getReference('Cantina:Client', $clientId));
        
        $this->em->persist($sale);
        
        $totalPrice = $this->addProductsToSale($sale, $productsList);
        
        $this->addTransaction($clientId, $sale, $type, $totalPrice);
        
        $this->em->flush();
    }
    
    private function addProductsToSale(Sale $sale, $productsList) {
        $totalPrice = 0;
        
        foreach ($productsList as $productInfo) {
            $product = $this->em->getRepository('Cantina:Product')->find($productInfo['id']);
            
            $sale->addProduct($product);
            $sale->setClient()
        }
    }
    
    private function addTransaction($clientId, $sale, $type, $totalPrice) {
        
    }
}
