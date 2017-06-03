<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use App\Entities\Address;
use App\Entities\Provider;

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
