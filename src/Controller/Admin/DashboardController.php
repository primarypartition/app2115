<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

use App\Entity\Offer;
use App\Entity\Product;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {  
        return parent::index();
    }

    // /**
    //  * @Route("/admin/offer", name="admin_offer")
    //  */
    // public function offer(): Response
    // {
    //     // redirect to some CRUD controller
    //     $routeBuilder = $this->get(AdminUrlGenerator::class);

    //     return $this->redirect($routeBuilder->setController(OfferCrudController::class)->generateUrl());

    //     // you can also redirect to different pages depending on the current user
    //     if ('jane' === $this->getUser()->getUsername()) {
    //         return $this->redirect('...');
    //     }

    //     // you can also render some template to display a proper Dashboard
    //     // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
    //     return $this->render('some/path/my-dashboard.html.twig');

    //     // return parent::index();
    // }

    // /**
    //  * @Route("/admin/product", name="admin_product")
    //  */
    // public function product(): Response
    // {
    //     // redirect to some CRUD controller
    //     $routeBuilder = $this->get(AdminUrlGenerator::class);

    //     return $this->redirect($routeBuilder->setController(ProductCrudController::class)->generateUrl());

    //     // you can also redirect to different pages depending on the current user
    //     if ('jane' === $this->getUser()->getUsername()) {
    //         return $this->redirect('...');
    //     }

    //     // you can also render some template to display a proper Dashboard
    //     // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
    //     return $this->render('some/path/my-dashboard.html.twig');

    //     // return parent::index();
    // }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('App2115');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Offer', 'fa fa-home', Offer::class);
        yield MenuItem::linkToCrud('Product', 'fa fa-home', Product::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
