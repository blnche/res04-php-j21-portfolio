<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Entity\User;
use App\Entity\ProjectImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(ProjectCrudController::class)->generateUrl();
        
        return $this->redirect($url);
        
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Res04 Php J21 Portfolio');
    }

    public function configureMenuItems(): iterable
    {
         
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('Projects', 'fas fa-list', Project::class);

        yield MenuItem::linkToRoute('Back to website', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('Users', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Projects', 'fas fa-list', Project::class);
        yield MenuItem::linkToCrud('Projects Images', 'fas fa-list', ProjectImage::class);
        
    }
}
