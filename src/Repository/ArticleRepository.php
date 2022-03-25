<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
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

    public function getArticlesCount(): int
    {
        $sql_connection = $this->getEntityManager()->getConnection();
        $sql            = "select count(*) from article";
        $statement      = $sql_connection->prepare($sql);
        $result         = $statement->executeQuery();

        return $result->fetchOne();
    }
    public function getArticlesPerPage($rows_count = 3, $start = 0): array
    {
        $sql_connection = $this->getEntityManager()->getConnection();
        $sql            = "select a.id, a.created, a.title, a.content, a.image_path, u.username, 
                            (select count(*) from comment where article_id = a.id) as comments_count,
                            (select GROUP_CONCAT(title) 
                                from tag as t join tag_article as ta 
                                on t.id = ta.tag_id
                                where ta.article_id = a.id) as article_tags
                            from article a join user u
                            on a.user_id = u.id
                            order by a.created desc 
                            limit $rows_count offset $start
                            ";
        $statement      = $sql_connection->prepare($sql);
        $result         = $statement->executeQuery();
        return $result->fetchAllAssociative();
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
        $previous_article = $this->createQueryBuilder('a')
                                    ->select('a.id','a.title','a.image_path')
                                    ->where('a.id < :current_id')
                                    ->setParameter('current_id', $current_article_id)
                                    ->setMaxResults(1)
                                    ->getQuery()
                                    ->getResult();

        $next_article    = $this->createQueryBuilder('a')
                              ->select('a.id','a.title','a.image_path')
                              ->where('a.id > :current_id')
                              ->setParameter('current_id', $current_article_id)
                              ->setMaxResults(1)
                              ->getQuery()
                              ->getResult();
        return [reset($previous_article), reset($next_article)];
    }

    public function getArticlesCountLastMonths(array $months_range)
    {
        array_walk($months_range, function (&$item){
            $item = sprintf("select %s month",$item);
        });
        $months_temp_table_sql = implode(" union all ", $months_range);

        $sql_connection = $this->getEntityManager()->getConnection();
        $sql            = "select count(a.id) as number_of_articles
                            from ($months_temp_table_sql) as t
                            left join article as a on MONTH(a.created) = t.month
                            group by t.month 
                            ";
        $statement      = $sql_connection->prepare($sql);
        $result         = $statement->executeQuery();

        return $result->fetchAllAssociative();
    }
}
