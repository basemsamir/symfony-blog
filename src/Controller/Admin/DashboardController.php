<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Setting;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DashboardController
 * @package App\Controller\Admin
 */
class DashboardController extends AbstractDashboardController
{
    private $adminUrlGenerator;
    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $hasAccess = $this->isGranted('ROLE_ADMIN');
        if($hasAccess)
            return parent::index();
        else{
            $url = $this->adminUrlGenerator
                        ->setController(ArticleCrudController::class)
                        ->setAction('index')
                        ->generateUrl();
            return $this->redirect($url);
        }

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Sensive Blog');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home')
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Category', 'fas fa-list', Category::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Article', 'fas fa-newspaper', Article::class)
        ->setPermission('ROLE_USER');
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Settings', 'fa fa-gear', Setting::class)
            ->setPermission('ROLE_ADMIN');
    }
}
