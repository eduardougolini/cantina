<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use OpenBoleto\Banco\BancoDoBrasil;
use OpenBoleto\Agente;
use App\Entities\Payment;

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
    
    /**
     * Gera boleto para o usuário
     * @param Request $request
     * @throws \Exception
     */
    public function generatePaymentSlip(Request $request) {
        $value = $request->get('value');
        
        $this->addUserPayment($value);
        
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
            'valor' => $value,
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
    
    /**
     * Adiciona ligação entre pagamento(boleto) e usuário
     * @param type $value
     */
    private function addUserPayment($value) {        
        $user = Auth::user();
        
        $clientId = $this->em->createQuery(
                'SELECT c.id '
                . 'FROM Cantina:Users u '
                . 'JOIN Cantina:Person p '
                    . 'WITH p = u.person '
                . 'JOIN Cantina:Client c '
                    . 'WITH c.person = p '
                . 'WHERE u = :userId'
                )->setParameter('userId', $user->id)
                ->getOneOrNullResult();
        
        $payment = new Payment();
        $payment->setClient($this->em->getReference('Cantina:Client', $clientId));
        $payment->setValue($value);
        $payment->setPaid(false);
        
        $this->em->persist($payment);
        $this->em->flush();
    }
    
    /**
     * Retorna os dados do sacado
     * @return Agente
     */
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
