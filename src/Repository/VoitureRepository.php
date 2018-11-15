<?php

namespace App\Repository;

use App\Entity\Voiture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Voiture|null find($id, $lockMode = null, $lockVersion = null)
 * @method Voiture|null findOneBy(array $criteria, array $orderBy = null)
 * @method Voiture[]    findAll()
 * @method Voiture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoitureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Voiture::class);
    }

    public function selectionVoiture()
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT v
            FROM App\Entity\Voiture v'
        );

        return $query->execute();
    }

    public function infoPourChaqueVoiture(int $id)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT v
            FROM App\Entity\Voiture v
            WHERE v = :id'
        );

        $query->setParameter('id', $id);

        return $query->getResult();
    }

    public function recupererParLieuxDeReception(): array{

        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT DISTINCT v.lieuReception
                FROM App\Entity\Voiture v
                WHERE v.disponibilite = true'
        );
        return array_flip(array_column($query->getScalarResult(), "lieuReception"));
    }

    public function selectionVoitureParLieuReception(string $lieu){
        $query = $this->getEntityManager()->createQuery("
            SELECT v FROM App\Entity\Voiture v WHERE v.lieuReception LIKE :lieu
        ");
        $query->setParameter('lieu', '%'.$lieu.'%');

        return $query->getResult();
    }
}
