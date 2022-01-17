<?php

namespace App\Controller;

use App\Entity\Category;
use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    private $category_service;

    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }

    /**
     * @Route(
     *     "/category/{id}/{page}",
     *     name="category_articles",
     *     requirements= {
     *     "category_id" =  "\d+",
     *     "page"        =  "\d+",
     *     }
     * )
     */
    public function index(Category $category, int $page = 1): Response
    {
        $category_name = $category->getName();
        $articles = $this->category_service->getCategoryArticlesPerPage($category->getId(), $page, 6);

        return $this->render('category/index.html.twig',
            compact('category_name','articles')
        );
    }
}
