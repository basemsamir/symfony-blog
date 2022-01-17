<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function getArticlesPerPageQuery(): QueryBuilder
    {
       return $this->createQueryBuilder('a')
                   ->orderBy('a.created', 'DESC')
                   ->join('a.comments','c')
                   ->join('a.user','u')
                   ->addSelect('a','c','u');

    }

    public function getCategoryArticlesPerPageQuery($category_id): QueryBuilder
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.created', 'DESC')
            ->join('a.comments','c')
            ->join('a.user','u')
            ->where('a.category = :id')
            ->setParameter('id',$category_id)
            ->addSelect('a','c','u');

    }


    public function findOrderedNumberOfArticles($limit = '3', $order_by = 'ASC')
    {
        return $this->createQueryBuilder('a')
            ->join('a.category', 'c')
            ->setMaxResults($limit)
            ->orderBy('a.created',$order_by)
            ->getQuery()
            ->getResult()
        ;
    }
}
