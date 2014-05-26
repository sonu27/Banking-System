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
        $accountRepo = $repository = $this->getDoctrine()->getRepository('ARBankingBundle:Account');
        $account     = $accountRepo->find($accountId);

        return $this->render(
            'ARBankingBundle:Account:years.html.twig',
            compact('account')
        );
    }

    public function viewAllAction($accountId)
    {
        $bankingRepo  = $this->getDoctrine()->getRepository('ARBankingBundle:Banking');
        $transactions = $bankingRepo->findByAccount($accountId);

        $accountRepo = $repository = $this->getDoctrine()->getRepository('ARBankingBundle:Account');
        $account     = $accountRepo->find($accountId);

        return $this->render(
            'ARBankingBundle:Default:account-transactions.html.twig',
            compact('transactions', 'account')
        );
    }

    public function viewYearAction($accountId, $year)
    {
        $bankingRepo  = $this->getDoctrine()->getRepository('ARBankingBundle:Banking');
        $transactions = $bankingRepo->findByAccountForYear($accountId, $year);

        $accountRepo = $repository = $this->getDoctrine()->getRepository('ARBankingBundle:Account');
        $account     = $accountRepo->find($accountId);

        return $this->render(
            'ARBankingBundle:Default:account-transactions.html.twig',
            compact('transactions', 'account', 'year')
        );
    }

    public function getTransactionsForYear($accountId, $year)
    {
        $bankingRepo = $this->getDoctrine()->getRepository('ARBankingBundle:Banking');

        $transactions = [];
        for ($month = 1; $month < 13; $month++) {
            $transactionsForMonth = $bankingRepo->findByAccountForMonth($accountId, $year, $month);

            if (!empty($transactionsForMonth)) {
                $transactions[] = $transactionsForMonth;
            }
        }

        return $transactions;
    }
}
