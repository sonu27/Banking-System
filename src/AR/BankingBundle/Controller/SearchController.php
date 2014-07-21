<?php

namespace AR\BankingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    public function indexAction(Request $request)
    {
        $query = $request->query->get('q');
        $bankingRepo  = $this->getDoctrine()->getRepository('ARBankingBundle:Banking');
        $transactions = $bankingRepo->search($query);

        return $this->render('ARBankingBundle:search:index.html.twig', compact('transactions'));
    }
}
