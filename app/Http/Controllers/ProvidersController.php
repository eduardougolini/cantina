<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use App\Entities\Provider;
use App\Entities\Address;
/**
 * Description of ProvidersController
 *
 * @author eduardo
 */
class ProvidersController extends Controller{
    
    private $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    /**
     * Retorna tela responsável pela listagem de fornecedores cadastrados no 
     * sistema
     * 
     * @return type
     * @throws \Exception
     */
    public function listProviders(){
        $user = $this->em->getRepository('Cantina:Users')->find(Auth::user()->id);
        if (! $user->hasRoleByName('manager')) {
            throw new \Exception('Acesso negado!', 403);
        }
        
        $providers = $this->em->createQuery(
                "SELECT p.id, p.name, p.phone, p.email, a.street, a.city, a.state, a.district, a.cep, a.number "
                . "FROM Cantina:Provider p "
                . "JOIN Cantina:Address a "
                    . "WITH p.id = a.provider ")
                ->getResult();
        
        return view('listProviders', ['user' => $user, 'providers' => $providers]);
    }
    
    /**
     * Responsável por renderizar a tela de registros de novos fornecedores no 
     * sistema
     * @return type
     * @throws \Exception
     */
    public function registerProviderView() {
        $user = $this->em->getRepository('Cantina:Users')->find(Auth::user()->id);
        if (! $user->hasRoleByName('manager')) {
            throw new \Exception('Acesso negado!', 403);
        }
        
        return view('registerProviders', ['user' => $user]);
    }
    
    /**
     * Responsável pelo registro de novos fornecedores no sistema
     * 
     * @param Request $request
     * @throws \Exception
     */
    public function registerNewProvider(Request $request) {
        
        $user = $this->em->getRepository('Cantina:Users')->find(Auth::user()->id);
        if (! $user->hasRoleByName('manager')) {
            throw new \Exception('Acesso negado!', 403);
        }
        
        $name = $request->get('name');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $street = $request->get('street');
        $district = $request->get('district');
        $state = $request->get('state');
        $city = $request->get('city');
        $cep = $request->get('cep');
        $number = $request->get('number');
        
        $provider = new Provider();
        $provider->setName($name);
        $provider->setEmail($email);
        $provider->setPhone($phone);
        $this->em->persist($provider);
        
        $address = new Address();
        $address->setProvider($provider);
        $address->setState($state);
        $address->setCity($city);
        $address->setStreet($street);
        $address->setNumber($number);
        $address->setDistrict($district);
        $address->setCep($cep);
        $this->em->persist($address);
        
        $this->em->flush();
    }
    
    /**
     * Responsável pela remoção de um ou mais fornecedores
     * 
     * @param Request $request
     * @throws \Exception
     */
    public function deleteProviders(Request $request) {
        
        $user = $this->em->getRepository('Cantina:Users')->find(Auth::user()->id);
        if (! $user->hasRoleByName('manager')) {
            throw new \Exception('Acesso negado!', 403);
        }
        
        $ids = json_decode($request->get('ids'));
        
        foreach ($ids as $id) {
            $provider = $this->em->getRepository('Cantina:Provider')->find($id);
            $address = $this->em->getRepository('Cantina:Address')->findOneBy([
                'provider'  =>  $provider
            ]);
            
            $this->em->remove($address);
            $this->em->remove($provider);
        }
        
        $this->em->flush();
    }
}
