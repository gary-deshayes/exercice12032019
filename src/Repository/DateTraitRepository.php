<?php

namespace App\Repository;

use App\Entity\DateTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DateTrait|null find($id, $lockMode = null, $lockVersion = null)
 * @method DateTrait|null findOneBy(array $criteria, array $orderBy = null)
 * @method DateTrait[]    findAll()
 * @method DateTrait[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DateTraitRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DateTrait::class);
    }

    // /**
    //  * @return DateTrait[] Returns an array of DateTrait objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DateTrait
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
