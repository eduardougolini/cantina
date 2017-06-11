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
    
    public function listProviders(){
        $user = Auth::user();
        
        $providers = $this->em->createQuery(
                "SELECT p.id, p.name, p.phone, p.email, a.street, a.city, a.state, a.district, a.cep, a.number "
                . "FROM Cantina:Provider p "
                . "JOIN Cantina:Address a "
                    . "WITH p.id = a.provider ")
                ->getResult();
        
        return view('listProviders', ['user' => $user, 'providers' => $providers]);
    }
    
    public function deleteProviders(Request $request){
    
        $id = $request->get('id');
        $provider = $this->em->getRepository('Cantina:Provider')->find($id);
        $this->em->remove($provider);
        $this->em->flush();
        
    }
    
    public function registerProviderView() {
        $user = Auth::user();
        return view('registerProviders', ['user' => $user]);
    }
    
    public function registerNewProvider(Request $request) {
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
}
