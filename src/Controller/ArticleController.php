<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Service\ArticleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    private $article_service;

    public function __construct(ArticleService $article_service)
    {
        $this->article_service = $article_service;
    }

    /**
     * @Route("/article/{id}", name="article")
     */
    public function index(Article $article): Response
    {
        $this->article_service->increaseViews($article);

        $pre_next_articles = $this->article_service->getPreviousNextArticles($article);
        return $this->render('article/index.html.twig', compact('article','pre_next_articles'));
    }
}
