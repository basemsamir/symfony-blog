<?php

namespace App\Controller;

use App\Service\ArticleService;
use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $article_service;
    private $category_service;

    public function __construct(ArticleService $article_service, CategoryService $category_service)
    {
        $this->article_service = $article_service;
        $this->category_service = $category_service;
    }

    /**
     * @Route(
     *     "/posts/{page}",
     *     name="posts",
     *     requirements= {"page" ="\d+"}
     *     )
     */
    public function index(int $page = 1): Response
    {
        $articles = $this->article_service->getArticlesPerPage($page, 3);
        $latest_articles = $this->article_service->getLatestArticles(6);

        return $this->render('home/index.html.twig', [
            'articles'          => $articles,
            'latest_articles'   => $latest_articles,
        ]);
    }
}
