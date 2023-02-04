<?php

namespace App\Repository;

use App\Entity\AccreditationPro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AccreditationPro>
 *
 * @method AccreditationPro|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccreditationPro|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccreditationPro[]    findAll()
 * @method AccreditationPro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccreditationProRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AccreditationPro::class);
    }

    public function save(AccreditationPro $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AccreditationPro $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return AccreditationPro[] Returns an array of AccreditationPro objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AccreditationPro
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findDemandes()
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.enAttente = :enAttente')
            ->setParameter('enAttente', true)
            ->andWhere('a.estAccepte = :estAccepte')
            ->setParameter('estAccepte', false)
            ->getQuery()
            ->execute();
    }
}
