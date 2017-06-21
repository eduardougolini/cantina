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
        $user = $this->em->getRepository('Cantina:Users')->find(Auth::user()->id);
        if (! $user->hasRoleByName('manager')) {
            throw new \Exception('Acesso negado!', 403);
        }
        
        
        $providers = $this->em->getRepository('Cantina:Provider')->findAll();
        
        return view('registerProduct', [
            'user' => $user, 
            'providers' => $providers
        ]);
    }   
    
    public function registerNewProduct(Request $request) {
        $user = $this->em->getRepository('Cantina:Users')->find(Auth::user()->id);
        if (! $user->hasRoleByName('manager')) {
            throw new \Exception('Acesso negado!', 403);
        }
        
        $name = $request->get('name');
        $description = $request->get('description');
        $value = $request->get('value');
        $amount = $request->get('amount');
        $providerId = $request->get('providerId');
        $entryDate = $request->get('entryDate');
        $validityDate = $request->get('validityDate');
        
        if (! $providerId) {
            throw new \Exception('Faltou adicionar o id do fornecedor');
        }
        
        $provider = $this->em->getRepository('Cantina:Provider')->find($providerId);
        
        $product = new Product();
        $product->setName($name);
        $product->setDescription($description);
        $product->setValue($value);
        $product->setAmount($amount);
        $product->setProvider($provider);
        $product->setDateEntry(new \DateTime($entryDate));
        $product->setValidity(new \DateTime($validityDate));
        
        $this->em->persist($product);
        $this->em->flush();
    }
    
    public function listProducts() {
        $user = Auth::user();
        
        $products = $this->em->createQuery(
                "SELECT p.id, p.name, p.description, p.value, p.amount, p.dateEntry, p.validity, p2.name as providerName "
                . "FROM Cantina:Product p "
                . "JOIN Cantina:Provider p2 "
                    . "WITH p2 = p.provider")
                ->getResult();
        
        return view('listProducts', ['user' => $user, 'products' => $products]);
    }
    
    public function getProductData($productId) {
        $product = $this->em->createQuery(
                'SELECT p '
                . 'FROM Cantina:Product p '
                . 'Where p = :productId'
                )->setParameter('productId', $productId)
                ->getArrayResult();
        
        return json_encode($product[0]);
    }
    
    public function deleteProducts(Request $request) {
        
        $user = $this->em->getRepository('Cantina:Users')->find(Auth::user()->id);
        if (! $user->hasRoleByName('manager')) {
            throw new \Exception('Acesso negado!', 403);
        }
        
        $ids = json_decode($request->get('ids'));
        
        foreach ($ids as $id) {
            $product = $this->em->getRepository('Cantina:Product')->find($id);
            
            $this->em->remove($product);
        }
        
        $this->em->flush();
    }
}