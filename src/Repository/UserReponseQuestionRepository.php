<?php

namespace App\Repository;

use App\Entity\UserReponseQuestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserReponseQuestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserReponseQuestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserReponseQuestion[]    findAll()
 * @method UserReponseQuestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserReponseQuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserReponseQuestion::class);
    }

    // /**
    //  * @return UserReponseQuestion[] Returns an array of UserReponseQuestion objects
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
    public function findOneBySomeField($value): ?UserReponseQuestion
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
