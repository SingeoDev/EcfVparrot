<?php

namespace App\Repository;

use App\Entity\Vehicles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vehicles>
 *
 * @method Vehicles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicles[]    findAll()
 * @method Vehicles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiclesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicles::class);
    }

    // public function save(Vehicles $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->persist($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

    // public function remove(Vehicles $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->remove($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

    public function getVehiclesFilters($priceMin, $priceMax, $kmMin, $kmMax, $yearMin, $yearMax)
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.price BETWEEN :priceMin and :priceMax')
            ->andWhere('c.mileage BETWEEN :kmMin and :kmMax')
            ->andWhere('c.years BETWEEN :yearMin and :yearMax')
            ->setParameter(':priceMin' , $priceMin)
            ->setParameter(':priceMax' , $priceMax)
            ->setParameter(':kmMin' , $kmMin)
            ->setParameter(':kmMax' , $kmMax)
            ->setParameter(':yearMin' , $yearMin)
            ->setParameter(':yearMax' , $yearMax)
            ;

        $qb->orderBy('c.price', 'ASC');

        return $qb->getQuery()->getResult();
    }

}