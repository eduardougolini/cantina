<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use OpenBoleto\Banco\BancoDoBrasil;
use OpenBoleto\Agente;

/**
 * Description of PaymentSlipController
 *
 * @author eduardo
 */
class PaymentSlipController extends Controller {
    
    private $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    public function generatePaymentSlip(Request $request) {
        $value = $request->get('value');
        
        if ($value < 0) {
            throw new \Exception('Valor negativo enviado para geração de boleto');
        }
        
        $sacado = $this->getSacado();
        $cedente = new Agente('Cantina IFC', '02.123.123/0001-11', 'CLS 403 Lj 23', '71000-000', 'Videira', 'SC');
        
        $date = new \DateTime();
        $date->modify('+3 day');
        
        $boleto = new BancoDoBrasil([
        // Parâmetros obrigatórios
        'dataVencimento' => $date,
        'valor' => 4,
        'sequencial' => 1234567,
        'sacado' => $sacado,
        'cedente' => $cedente,
        'agencia' => 1724, // Até 4 dígitos
        'carteira' => 18,
        'conta' => 10403005, // Até 8 dígitos
        'convenio' => 1234, // 4, 6 ou 7 dígitos
        'contaDv' => 2,
        'agenciaDv' => 1,
        'descricaoDemonstrativo' => [ // Até 5
            'Adição de saldo na carteira',
        ],
        'instrucoes' => [ // Até 8
            'Não receber após o vencimento.',
        ],
    ]);

    echo $boleto->getOutput();
    }
    
    private function getSacado() {
        $user = Auth::user();
        
        $userInfo = $this->em->createQuery(
                "SELECT p.name, p.cpf, a.district, a.street, a.city, a.cep, a.state "
                . "FROM Cantina:Users u "
                . "JOIN Cantina:Person p "
                    . "WITH p.id = u.person "
                . "JOIN Cantina:Address a "
                    . "WITH a.person = p "
                . "WHERE u = :userId"
            )->setParameter('userId', $user->id)
            ->getOneOrNullResult();
        
        return new Agente(
                $userInfo['name'],
                $userInfo['cpf'],
                $userInfo['district'] . ' - ' . $userInfo['street'], 
                $userInfo['cep'], 
                $userInfo['city'], 
                $userInfo['state']
        );
    }
}
