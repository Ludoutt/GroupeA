<?php

namespace App\Repository;

use App\Entity\BoardUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BoardUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method BoardUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method BoardUser[]    findAll()
 * @method BoardUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoardUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoardUser::class);
    }

    // /**
    //  * @return BoardUser[] Returns an array of BoardUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BoardUser
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
