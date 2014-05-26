<?php

namespace AR\BankingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccountViewController extends Controller
{
    public function yearsActiveAction($accountId)
    {
        $years = $this->getYearsActive($accountId);

        $accountRepo = $repository = $this->getDoctrine()->getRepository('ARBankingBundle:Account');
        $account     = $accountRepo->find($accountId);

        return $this->render(
            'ARBankingBundle:Account:years-nav.html.twig',
            compact('years', 'account')
        );
    }

    public function getYearsActive($accountId)
    {
        $conn = $this->get('database_connection');
        $sql  = 'SELECT DISTINCT DATE_FORMAT(date, "%Y") AS year FROM banking WHERE account_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $accountId);
        $stmt->execute();
        $years = $stmt->fetchAll();

        return $years;
    }
}
