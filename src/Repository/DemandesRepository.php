<?php

namespace App\Repository;

use App\Entity\Demandes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Demandes>
 *
 * @method Demandes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Demandes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Demandes[]    findAll()
 * @method Demandes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Demandes::class);
    }

    public function save(Demandes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Demandes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Demandes[] Returns an array of Demandes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Demandes
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findWithUser($id)
    {
        return $this->createQueryBuilder('d')
            ->innerJoin('d.user', 'u')
            ->addSelect('u')
            ->andWhere('u.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
    }

    public function findDemandeProposition($id)
    {
        return $this->createQueryBuilder('d')
            ->innerJoin('d.service', 's')
            ->addSelect('s')
            ->innerJoin('s.user', 'u')
            ->addSelect('u')
            ->andWhere('u.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
    }
}
