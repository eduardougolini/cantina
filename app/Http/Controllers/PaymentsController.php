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
                'SELECT p.id, p.paid, p.value, p1.name '
                . 'FROM Cantina:Payment p '
                . 'JOIN Cantina:Client c '
                    . 'WITH c = p.client '
                . 'JOIN Cantina:Person p1 '
                    . 'WITH p1 = c.person'
                )->getResult();
        
        return view('payments', ['user' => $user, 'payments' => $payments]);
    }
    
    public function setPaymentAsPaid(Request $request) {
        
        $user = $this->em->getRepository('Cantina:Users')->find(Auth::user()->id);
        if (! $user->hasRoleByName('manager')) {
            throw new \Exception('Acesso negado!', 403);
        }
        
        $paymentId = $request->get('paymentId');
        
        $payment = $this->em->getRepository('Cantina:Payment')->find($paymentId);
        $payment->setPaid(true);
        
        $this->em->flush();
        
        $this->em->createQuery(
                'UPDATE Cantina:Account a '
                . 'SET a.balance = (a.balance + :value) '
                . 'WHERE a = :accountId'
                )->setParameter('accountId', $payment->getClient()->getAccount())
                ->setParameter('value', $payment->getValue())
                ->execute();
    }
}
