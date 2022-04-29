<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\CommentFormType;
use App\Repository\ArticleRepository;
use App\Service\ArticleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Article $article, Request $request): Response
    {
        $this->article_service->increaseViews($article);

        $pre_next_articles  = $this->article_service->getPreviousNextArticles($article);
        $comment_form       = $this->createForm(CommentFormType::class);
        $comment_form->handleRequest($request);

        if ($comment_form->isSubmitted() && $comment_form->isValid()) {
            $comment_data = $comment_form->getData();
            $this->article_service->postArticleComment($comment_data);
            return $this->redirectToRoute('article',['id'=>$article->getId()]);
        }

        $comment_form = $comment_form->createView();
        return $this->render(
            'article/index.html.twig',
            compact('article',
                  'pre_next_articles',
                              'comment_form'));
    }

    /**
     * @Route (
     *     "/get-popular-articles",
     *     name = "get-popular-articles"
     *     )
     *
     * @return JsonResponse
     */
    public function listPopularArticles(): JsonResponse
    {
        $popular_articles   =   $this->article_service->getPopularArticles(3);

        return new JsonResponse(
            [
                'data'  =>  $popular_articles
            ]
        );
    }

}
