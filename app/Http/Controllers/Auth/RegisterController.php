<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use App\Entities\Account;
use App\Entities\Person;
use App\Entities\Client;
use App\Entities\Users;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    private $em;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EntityManager $em) {
        $this->middleware('guest');
        $this->em = $em;
    }
    
    public function create(Request $request) {
        $data['username'] = $request->get('username');
        $data['responsibleName'] = $request->get('responsibleName');
        $data['email'] = $request->get('email');
        $data['password'] = $request->get('password');
        $data['birth'] = new \DateTime($request->get('birthDate'));
        $data['cpf'] = $request->get('cpf');
        $data['rg'] = $request->get('rg');
        $data['registration'] = $request->get('registration');
        $data['phone'] = $request->get('phone');
        
        $account = $this->createUserAccount();
        $person = $this->createPerson($data);
        
        $client = new Client();
        $client->setAccount($account);
        $client->setPerson($person);
        $client->setRegitration($data['registration']);
        
        $user = new Users();
        $user->setEmail($data['email']);
        $user->setPassword(bcrypt($data['password']));
        $user->setPerson($person);
        
        $this->em->persist($client);
        $this->em->persist($user);
        
        $this->em->flush();
        
        return route('login');
    }
    
    private function createUserAccount() {
        $account = new Account();
        $account->setBalance(0);
        
        $this->em->persist($account);
        
        return $account;
    }
    
    private function createPerson($data) {
        $person = new Person();
        $person->setName($data['username']);
        $person->setResponsible($data['responsibleName']);
        $person->setEmail($data['email']);
        $person->setBirth($data['birth']->format('Y-m-d H:i:s'));
        $person->setCpf($data['cpf']);
        $person->setRg($data['rg']);
        $person->setPhone($data['phone']);
        
        $this->em->persist($person);
        
        return $person;
    }
}
