<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Entities\Product;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use App\Entities\Payment;

/**
 * Description of PaymentsController
 *
 * @author eduardo
 */
class PaymentsController extends Controller {
    
    private $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    public function renderPaymentsView() {
        $user = Auth::user();
        
        $payments = $this->em->createQuery(
                'SELECT p.id, p.paid, p.valor, p1.name '
                . 'FROM Cantina:Payment p '
                . 'JOIN Cantina:Client c '
                    . 'WITH c = p.client '
                . 'JOIN Cantina:Person p1 '
                    . 'WITH p1 = c.person'
                )->getResult();
        
        return view('payments', ['user' => $user, 'payments' => $payments]);
    }
}
