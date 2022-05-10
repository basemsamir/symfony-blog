<?php


namespace App\Service;


use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
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

    public function getCategory(int $category_id)
    {
        return $this->category_repo->find($category_id);
    }

    public function getAllCategories(bool $cached = true): array
    {
        $categories = $this->category_repo->getArticlesCountPerCategory();

        array_walk($categories, function (&$item){
      //     $item['category_url'] =  $this->router->generate('category_articles',['id' => $item['id']]);
        });

        return $categories;
    }

    public function getCategoryArticlesPerPage($category_id, $page_number, $articles_per_page): array
    {
        $start    = ($page_number - 1) * $articles_per_page;
        $articles = $this->getDoctrine()
                         ->getRepository(Article::class)
                         ->getCategoryArticlesPerPageQuery($category_id, $articles_per_page, $start);

        $package = new Package(new EmptyVersionStrategy());
        array_walk($articles, function (&$item) use ($package){
            $item['image_path']   = $package->getUrl('/img/'.$item['image_path']);
            $item['article_url'] =  $this->router->generate('article',['id' => $item['id']]);
        });

        return $articles;
    }

    public function getCategoryArticlesCount(int $category_id): int
    {
        return $this->category_repo->getArticlesCount($category_id);
    }
}