<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\User;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $categories = $this->doctrine->getRepository(Category::class)->findAll();
        $articles = $this->doctrine->getRepository(Article::class)->findAll();

        return $this->render('home/index.html.twig', [
            'categories' => $categories,
            'articles'   => $articles,
        ]);
    }
}
