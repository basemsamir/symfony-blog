<?php


namespace App\Service;


use App\Entity\Article;
use Doctrine\Persistence\ManagerRegistry;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;

class ArticleService extends AbstractService
{
    private $article_repo;

    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine);
        $this->article_repo = $this->doctrine->getRepository(Article::class);
    }

    public function getArticlesPerPage($page_number, $articles_per_page): Pagerfanta
    {
        $article_query = $this->article_repo->getArticlesPerPageQuery();
        $page = new Pagerfanta(new QueryAdapter($article_query));
        $page->setMaxPerPage($articles_per_page);
        return $page->setCurrentPage($page_number);
    }

    public function getLatestArticles($number_of_articles)
    {
        return $this->article_repo->getOrderedNumberOfArticles($number_of_articles, 'DESC');
    }

    public function getPreviousNextArticles(Article $current_article)
    {
        return $this->article_repo->getPrevNextArticle($current_article->getId());
    }

    public function increaseViews(Article $article)
    {
        $this->article_repo->increaseViews($article);
    }

    public function getPopularArticles($number_of_articles)
    {
        return $this->article_repo->getMostViewedArticles($number_of_articles);
    }
}