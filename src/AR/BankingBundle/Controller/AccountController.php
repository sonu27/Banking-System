<?php

namespace AR\BankingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccountController extends Controller
{
    public function indexAction()
    {
        $accountRepo = $repository = $this->getDoctrine()->getRepository('ARBankingBundle:Account');
        $accounts    = $accountRepo->findAll();

        return $this->render('ARBankingBundle:Account:index.html.twig', compact('accounts'));
    }

    public function viewAction($accountId)
    {
        $bankingRepo  = $this->getDoctrine()->getRepository('ARBankingBundle:Banking');
        $transactions = $bankingRepo->findAllFromAccount($accountId);

        return $this->render('ARBankingBundle:Default:index.html.twig', compact('transactions'));
    }
}
