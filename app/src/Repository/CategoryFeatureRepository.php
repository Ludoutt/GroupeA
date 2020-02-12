<?php

namespace App\Repository;

use App\Entity\CategoryFeature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CategoryFeature|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryFeature|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryFeature[]    findAll()
 * @method CategoryFeature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryFeatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryFeature::class);
    }

    // /**
    //  * @return CategoryFeature[] Returns an array of CategoryFeature objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoryFeature
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
