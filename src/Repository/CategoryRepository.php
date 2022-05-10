<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function getArticlesCountPerCategory(): array
    {
        $sql_connection = $this->getEntityManager()->getConnection();
        $sql            = "select ca.id, ca.name, count(a.id) as articles_count
                            from article a join category ca
                            on a.category_id = ca.id
                            group by ca.id
                            ";
        $statement      = $sql_connection->prepare($sql);
        $result         = $statement->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function getArticlesCount(int $id): int
    {
        $sql_connection = $this->getEntityManager()->getConnection();
        $sql            = "select count(*) from article where category_id = $id";
        $statement      = $sql_connection->prepare($sql);
        $result         = $statement->executeQuery();

        return $result->fetchOne();
    }
    /*
    public function findOneBySomeField($value): ?Category
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
