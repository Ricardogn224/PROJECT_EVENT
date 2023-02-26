<?php

namespace App\Repository;

use App\Entity\Service;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Service>
 *
 * @method Service|null find($id, $lockMode = null, $lockVersion = null)
 * @method Service|null findOneBy(array $criteria, array $orderBy = null)
 * @method Service[]    findAll()
 * @method Service[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Service::class);
    }

    public function save(Service $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Service $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Service[] Returns an array of Service objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Service
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    #une fonction qui permet de trouver le service par la catégorie
    public function findByCategory($category)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.category = :category')
            ->setParameter('category', $category)
            ->getQuery()
            ->execute();
    }
    public function findWithUser($id)
        {
            return $this->createQueryBuilder('s')
                ->innerJoin('s.user', 'u')
                ->addSelect('u')
                ->andWhere('u.id = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->execute();
        }

    public function findByEvent($event)
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.evenements', 'e')
            ->addSelect('e')
            ->andWhere('e.nom = :nom')
            ->setParameter('nom', $event)
            ->getQuery()
            ->execute();
    }
}
