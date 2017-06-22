<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use App\Entities\Sale;
use App\Entities\SaleHasProduct;
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
    
    /**
     * Responsável pela renderização da tela de registro de vendas
     * 
     * @return type
     * @throws \Exception
     */
    public function registerSaleView() {
        
        $user = $this->em->getRepository('Cantina:Users')->find(Auth::user()->id);
        if (! $user->hasRoleByName('manager')) {
            throw new \Exception('Acesso negado!', 403);
        }

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
    
    /**
     * Responsável pelo registro de novas vendas
     * 
     * @param Request $request
     * @throws \Exception
     */
    public function registerNewSale(Request $request) {
        
        $user = $this->em->getRepository('Cantina:Users')->find(Auth::user()->id);
        if (! $user->hasRoleByName('manager')) {
            throw new \Exception('Acesso negado!', 403);
        }
        
        $clientId = $request->get('clientId');
        $inCash = $request->get('inCash');
        $paymentSlip = $request->get('paymentSlip');
        $productsList = $request->get('productsList');
        
        if ($inCash === 'true') {
            $type = 'DINHEIRO';
        } else if ($paymentSlip === 'true') {
            $type = 'DEBITO';
        }
        
        $client = $this->em->getRepository('Cantina:Client')->find($clientId);
        
        $sale = new Sale();
        $sale->setDate(new \DateTime());
        $sale->setType($type);
        $sale->setClient($client);
        
        $this->em->persist($sale);
        
        $totalPrice = $this->addProductsToSale($sale, $productsList);
        
        $this->addTransaction($client, $sale, $type, $totalPrice);
        
        $this->deductValueFromAccountBalance($client, $totalPrice);
        
        $this->em->flush();
    }
    
    /**
     * Reponsável por adicionar produtos a uma venda
     * 
     * @param Sale $sale
     * @param type $productsList
     * @return type
     */
    private function addProductsToSale(Sale $sale, $productsList) {
        $totalPrice = 0;
        
        foreach ($productsList as $productInfo) {
            $product = $this->em->getRepository('Cantina:Product')->find($productInfo['product_id']);
            $saleHasProduct = new SaleHasProduct();
            $saleHasProduct->setSale($sale);
            $saleHasProduct->setProduct($product);
            $saleHasProduct->setAmount($productInfo['ammount']);
            
            $totalPrice += $product->getValue();
            
            $this->em->persist($saleHasProduct);
        }
        
        return $totalPrice;
    }
    
    /**
     * Adiciona um pagamento/transação ao usuário responsável pela compra
     * 
     * @param type $client
     * @param type $sale
     * @param type $type
     * @param type $totalPrice
     */
    private function addTransaction($client, $sale, $type, $totalPrice) {
        $transaction = new Transaction();
                
        $transaction->setAccount($client->getAccount());
        $transaction->setDate(new \DateTime());
        $transaction->setSale($sale);
        $transaction->setType($type);
        $transaction->setValue($totalPrice);
        
        $this->em->persist($transaction);
    }
    
    /**
     * Responsável pelo desconto na conta do usuário
     * 
     * @param type $client
     * @param type $totalValue
     */
    private function deductValueFromAccountBalance($client, $totalValue) {
        $account = $client->getAccount();
        
        $actualBalance = $account->getBalance();
        $account->setBalance($actualBalance - $totalValue);
    }
}
