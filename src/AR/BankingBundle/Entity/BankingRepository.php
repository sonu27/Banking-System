<?php

namespace AR\BankingBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BankingRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BankingRepository extends EntityRepository
{
    public function findByAccount($accountId)
    {
        return $this->findBy(['account' => $accountId]);
    }

    public function findByAccountWithinPeriod($accountId, $startDate, $endDate)
    {
        $query = $this->createQueryBuilder('b')
            ->where('b.account = :accountId')
            ->andWhere('b.date BETWEEN :startDate AND :endDate')
            ->setParameter('accountId', $accountId)
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->getQuery();

        return $query->getResult();
    }

    public function findByAccountForMonth($accountId, $year, $month)
    {
        $time            = mktime(0, 0, 0, $month, 1, $year);
        $firstDayOfMonth = date('Y-m-d', $time);
        $lastDayOfMonth  = date('Y-m-t', $time);

        return $this->findByAccountWithinPeriod($accountId, $firstDayOfMonth, $lastDayOfMonth);
    }

    public function findByAccountForYear($accountId, $year)
    {
        $firstDayOfYear = $year.'-01-01';
        $lastDayOfYear  = $year.'-12-31';

        return $this->findByAccountWithinPeriod($accountId, $firstDayOfYear, $lastDayOfYear);
    }

    public function search($description)
    {
        $query = $this->createQueryBuilder('b')
            ->where('b.description LIKE :description')
            ->setParameter('description', '%'.$description.'%')
            ->getQuery();

        return $query->getResult();
    }
}
