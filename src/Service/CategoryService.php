<?php


namespace App\Service;


use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class CategoryService extends AbstractService
{
    private $category_repo;

    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine);
        $this->category_repo = $this->doctrine->getRepository(Category::class);
    }

    public function getAllCategories(bool $cached = true): array
    {
        if($cached){
            $cached_categories = $this->cache->getItem('categories.all');
            if(!$cached_categories->isHit()){
                $cached_categories->set($this->category_repo->findAll());
                $this->cache->save($cached_categories);
            }
            return $cached_categories->get();
        }
        return $this->category_repo->findAll();
    }

    public function getCategoryArticlesPerPage($category_id, $page_number, $articles_per_page): Pagerfanta
    {
        $article_query = $this->getDoctrine()
                              ->getRepository(Article::class)
                              ->getCategoryArticlesPerPageQuery($category_id);
        $page = new Pagerfanta(new QueryAdapter($article_query));
        $page->setMaxPerPage($articles_per_page);
        return $page->setCurrentPage($page_number);
    }
}