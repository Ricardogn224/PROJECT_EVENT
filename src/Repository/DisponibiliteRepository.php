<?php

namespace App\Repository;

use App\Entity\Disponibilite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Disponibilite>
 *
 * @method Disponibilite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Disponibilite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Disponibilite[]    findAll()
 * @method Disponibilite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisponibiliteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disponibilite::class);
    }

    public function save(Disponibilite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Disponibilite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findDateLibre($id_serv, $date_dispo): ?Disponibilite
    {
        return $this->createQueryBuilder('d')
            ->innerJoin('d.service', 's')
            ->addSelect('s')
            ->andWhere('s.id = :id_serv')
            ->setParameter('id_serv', $id_serv)
            ->andWhere('d.date = :date_dispo')
            ->setParameter('date_dispo', $date_dispo)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findFirstDispo(): array
    {
        return $this->createQueryBuilder('d')
            ->innerJoin('d.service', 's')
            ->addSelect('s')
            ->addOrderBy('s.id', 'ASC')
            ->addOrderBy('d.date', 'ASC')
            ->andWhere('d.libre = :libre')
            ->setParameter('libre', true)
            ->getQuery()
            ->getResult();
    }

    public function findDispoById($id_serv): array
    {
        return $this->createQueryBuilder('d')
            ->innerJoin('d.service', 's')
            ->addSelect('s')
            ->addOrderBy('d.date', 'ASC')
            ->andWhere('s.id = :id')
            ->setParameter('id', $id_serv)
            ->andWhere('d.libre = :libre')
            ->setParameter('libre', true)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Disponibilite[] Returns an array of Disponibilite objects
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

//    public function findOneBySomeField($value): ?Disponibilite
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
