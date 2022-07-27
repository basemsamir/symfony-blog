<?php

namespace App\Controller;

use App\Entity\Category;
use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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

    /**
     * @Route(
     *     "/get-category/{id}/{page}",
     *     name="getCategory",
     *     requirements= {
     *     "id"     =  "\d+",
     *     "page"   =  "\d+",
     *     }
     * )
     */
    public function getCategory(int $id, int $page = 1): JsonResponse
    {
        if($category = $this->category_service->getCategory($id)){
            $category_name   = $category->getName();
        }else{
            return $this->json([
                'message' => 'Category is not found!'
            ],404);
        }

        $articles        = $this->category_service->getCategoryArticlesPerPage($id, $page, 6);
        $number_of_pages = ceil($this->category_service->getCategoryArticlesCount($id) / 6);

        return $this->json(
            compact('category_name','articles','number_of_pages')
        );
    }

    /**
     * @Route (
     *     "/get-articles-count/",
     *     name="get-categories-with-articles-count"
     *     )
     * @return JsonResponse
     */
    public function getCategoriesWithArticlesCount(): JsonResponse
    {
        return new JsonResponse(
            [
                'data' => $this->category_service->getAllCategories()
            ]
        );
    }
}
