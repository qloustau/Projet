<?php

namespace App\Repository;

use App\Entity\Plein;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Plein|null find($id, $lockMode = null, $lockVersion = null)
 * @method Plein|null findOneBy(array $criteria, array $orderBy = null)
 * @method Plein[]    findAll()
 * @method Plein[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PleinRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Plein::class);
    }

    // /**
    //  * @return Plein[] Returns an array of Plein objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Plein
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
