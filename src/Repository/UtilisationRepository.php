<?php

namespace App\Repository;

use App\Entity\Utilisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Utilisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisation[]    findAll()
 * @method Utilisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Utilisation::class);
    }

    // /**
    //  * @return Utilisation[] Returns an array of Utilisation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Utilisation
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
