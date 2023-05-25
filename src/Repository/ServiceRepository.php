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

    public function findOneBySearch($value): ?Service
    {

        return $this->createQueryBuilder('s')

            ->andWhere('s.description LIKE :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult();
    }

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

    public function findBySearch($data_search)
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.user', 'u')
            ->addSelect('u')
            ->andWhere('s.nom LIKE :term OR s.description LIKE :term OR s.localisation LIKE :term  OR u.nom LIKE :term OR u.prenom LIKE :term')
            ->setParameter('term', '%' . $data_search . '%')
            ->getQuery()
            ->execute();
    }

    #trouver le prix entre les deux
    public function findByPriceSuperieur($minP)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.prix > :term ')
            ->setParameter('term', $minP)
            ->getQuery()
            ->execute();
    }

    #trouver le prix entre les deux
    public function findByPriceInferieur($maxP)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.prix <= :term ')
            ->setParameter('term', $maxP)
            ->getQuery()
            ->execute();
    }

    #trouver le prix entre les deux
    public function findByBetweenPrice($minPrice, $maxPrice)
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.user', 'u')
            ->addSelect('u')
            ->andWhere('s.prix >= :min AND s.prix <= :max')
            ->setParameter('min', $minPrice)
            ->setParameter('max', $maxPrice)
            ->getQuery()
            ->execute();
    }

    #trouver les services supérieur ou égale à cette note
    public function findByNote($note)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.noteMoy >= :note ')
            ->setParameter('note', $note)
            ->getQuery()
            ->execute();
    }

}
