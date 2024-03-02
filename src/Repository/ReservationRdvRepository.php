<?php

namespace App\Repository;

use App\Entity\ReservationRdv;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReservationRdv>
 *
 * @method ReservationRdv|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReservationRdv|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReservationRdv[]    findAll()
 * @method ReservationRdv[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationRdvRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReservationRdv::class);
    }

//    /**
//     * @return ReservationRdv[] Returns an array of ReservationRdv objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ReservationRdv
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
