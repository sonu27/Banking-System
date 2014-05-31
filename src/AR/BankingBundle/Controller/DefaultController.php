<?php

namespace AR\BankingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $bankingRepo  = $this->getDoctrine()->getRepository('ARBankingBundle:Banking');
        $transactions = $bankingRepo->findBy([], ['date' => 'desc']);

        return $this->render('ARBankingBundle:Default:index.html.twig', compact('transactions'));
    }
}
