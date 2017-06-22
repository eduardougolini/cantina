<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Doctrine\ORM\EntityManager;

/**
 * Description of WalletController
 *
 * @author eduardo
 */
class WalletController extends Controller{
    
    private $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    /**
     * Responsável por renderizar a tela da carteira do usuário
     * 
     * @return type
     */
    public function showWallet(){
        $user = Auth::user();
        
        $account = $this->em->createQuery(
                'SELECT a '
                . 'FROM Cantina:Users u '
                . 'JOIN Cantina:Person p '
                    . 'WITH p = u.person '
                . 'JOIN Cantina:Client c '
                    . 'WITH c.person = p '
                . 'JOIN Cantina:account a '
                    . 'WITH a = c.account '
                . 'WHERE u = :userId'
                )->setParameter('userId', $user->id)
                ->getOneOrNullResult();
        
        $transactions = $this->em->getRepository('Cantina:Transaction')->findBy([
            'account' => $account->getId()
        ]);

        return view('wallet', ['user' => $user, 'account' => $account, 'transactions' => $transactions]);

    }
}
