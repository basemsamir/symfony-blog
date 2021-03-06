<?php

namespace App\Tests\Service;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Service\ArticleService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ArticleServiceTest extends KernelTestCase
{
    private $articleService;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        self::bootKernel();

        $this->articleService = static::getContainer()->get(ArticleService::class);
    }


    public function testGetArticlesCount(): void
    {
        $articlesCount  = $this->articleService->getArticlesCount();

        $this->assertEquals(31, $articlesCount);
    }

    public function testGetArticlesPerFirstPage(): void
    {
        $articles = $this->articleService->getArticlesPerPage(1, 3);

        $this->assertEquals(3, count($articles));
    }

    public function testGetArticlesPerLastPage(): void
    {
        $articles = $this->articleService->getArticlesPerPage(11, 3);

        $this->assertEquals(1, count($articles));
    }

    public function testGetLastArticle(): void
    {
        $lastArticle = [
            "id" => "125",
            "created" => "2022-02-16",
            "title" => "I am admin",
            "image_path" => "/img/212442263_10159857138972650_8165063009669159094_n.jpg",
            "category_id" => "15",
            "category_name" => "News",
            "article_url" => "/article/125"
        ];

        $article = $this->articleService->getLatestArticles(1);

        $this->assertEquals($lastArticle, $article[0]);
    }

    public function testIncreaseViewsOfArticle(): void
    {
        $articleRepo = static::getContainer()->get(ArticleRepository::class);

        $article          = $articleRepo->find(125);
        $previousViews    = $article->getViews();

        $this->articleService->increaseViews($article);

        $article  = $articleRepo->find(125);
        $newViews = $article->getViews();

        $this->assertEquals($previousViews+1, $newViews);
    }
}
