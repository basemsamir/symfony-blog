<?php


namespace App\Service;


use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CategoryService extends AbstractService
{
    private $category_repo;
    private $router;

    public function __construct(ManagerRegistry $doctrine, UrlGeneratorInterface $router)
    {
        parent::__construct($doctrine);
        $this->category_repo = $this->doctrine->getRepository(Category::class);
        $this->router        = $router;
    }

    public function getAllCategories(bool $cached = true): array
    {
        $categories = $this->category_repo->getArticlesCountPerCategory();

        array_walk($categories, function (&$item){
           $item['category_url'] =  $this->router->generate('category_articles',['id' => $item['id']]);
        });

        return $categories;
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