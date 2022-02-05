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

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\ORMException
     */
    public function increaseViews(Article $article)
    {
        $article->setViews($article->getViews()+1);
        $this->getEntityManager()->persist($article);
        $this->getEntityManager()->flush();
    }

    public function getArticlesPerPageQuery(): QueryBuilder
    {
       return $this->createQueryBuilder('a')
                   ->orderBy('a.created', 'DESC')
                   ->leftJoin('a.comments','c')
                   ->join('a.user','u')
                   ->addSelect('a','c','u');

    }

    public function getCategoryArticlesPerPageQuery($category_id): QueryBuilder
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.created', 'DESC')
            ->leftJoin('a.comments','c')
            ->join('a.user','u')
            ->where('a.category = :id')
            ->setParameter('id',$category_id)
            ->addSelect('a','c','u');

    }

    public function getOrderedNumberOfArticles($limit = '3', $order_by = 'ASC')
    {
        return $this->createQueryBuilder('a')
            ->join('a.category', 'c')
            ->setMaxResults($limit)
            ->orderBy('a.created',$order_by)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getMostViewedArticles($limit = '3')
    {
        return $this->createQueryBuilder('a')
            ->where('a.views is not null')
            ->setMaxResults($limit)
            ->orderBy('a.views','DESC')
            ->getQuery()
            ->getResult();
    }

    public function getPrevNextArticle(int $current_article_id): array
    {
        $previous_article =  $this->createQueryBuilder('a')
                                    ->select('a.id','a.title','a.image_path')
                                    ->where('a.id < :current_id')
                                    ->setParameter('current_id', $current_article_id)
                                    ->setMaxResults(1)
                                    ->getQuery()
                                    ->getResult();

        $next_article =  $this->createQueryBuilder('a')
                              ->select('a.id','a.title','a.image_path')
                              ->where('a.id > :current_id')
                              ->setParameter('current_id', $current_article_id)
                              ->setMaxResults(1)
                              ->getQuery()
                              ->getResult();
        return [reset($previous_article), reset($next_article)];
    }
}
