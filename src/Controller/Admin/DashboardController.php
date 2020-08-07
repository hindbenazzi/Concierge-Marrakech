<?php

namespace App\Controller\Admin;

use App\Entity\CarsImages;
use App\Entity\ConciergeService;
use App\Entity\ConciergeServiceAR;
use App\Entity\ConciergeServiceFR;
use App\Entity\LuxuryCars;
use App\Entity\LuxuryCarsAR;
use App\Entity\LuxuryCarsFR;
use App\Entity\PalaceImages;
use App\Entity\Partners;
use App\Entity\PrivatePalace;
use App\Entity\PrivatePalaceAR;
use App\Entity\PrivatePalaceFR;
use App\Entity\PrivateResidence;
use App\Entity\PrivateResidenceAR;
use App\Entity\PrivateResidenceFR;
use App\Entity\ResidenceImages;
use App\Entity\Slider;
use App\Entity\Testimonials;
use App\Entity\TestimonialsAR;
use App\Entity\TestimonialsFR;
use App\Entity\TripImages;
use App\Entity\VIPTrips;
use App\Entity\VIPTripsAR;
use App\Entity\VIPTripsFR;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(ConciergeServiceCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Concierge Marrakech');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Concierge Services');
        yield MenuItem::linkToCrud('Concierge Services', 'fas fa-concierge-bell', ConciergeService::class);
        yield MenuItem::linkToCrud('Concierge ServicesAr', 'fas fa-concierge-bell', ConciergeServiceAR::class);
        yield MenuItem::linkToCrud('Concierge ServicesFr', 'fas fa-concierge-bell', ConciergeServiceFR::class);
        yield MenuItem::section('Luxury Cars');
        yield MenuItem::linkToCrud('Luxury Cars', 'fas fa-car', LuxuryCars::class);
        yield MenuItem::linkToCrud('Luxury CarsAr', 'fas fa-car', LuxuryCarsAR::class);
        yield MenuItem::linkToCrud('Luxury CarsFr', 'fas fa-car', LuxuryCarsFR::class);
        yield MenuItem::linkToCrud('Cars Images', 'fas fa-car', CarsImages::class);
        yield MenuItem::section('Private Palaces');
        yield MenuItem::linkToCrud('Private Palaces', 'fas fa-place-of-worship', PrivatePalace::class);
        yield MenuItem::linkToCrud('Private PalacesAr', 'fas fa-place-of-worship', PrivatePalaceAR::class);
        yield MenuItem::linkToCrud('Private PalacesFr', 'fas fa-place-of-worship', PrivatePalaceFR::class);
        yield MenuItem::linkToCrud('Palace Images ', 'fas fa-place-of-worship', PalaceImages::class);
        yield MenuItem::section('Private Residences');
        yield MenuItem::linkToCrud('Private Residences', 'far fa-building', PrivateResidence::class);
        yield MenuItem::linkToCrud('Private ResidencesAr', 'far fa-building', PrivateResidenceAR::class);
        yield MenuItem::linkToCrud('Private ResidencesFr', 'far fa-building', PrivateResidenceFR::class);
        yield MenuItem::linkToCrud('Residence Images ', 'far fa-building', ResidenceImages::class);
        yield MenuItem::section('VIP Trips');
        yield MenuItem::linkToCrud('VIP Trips', 'fas fa-suitcase-rolling', VIPTrips::class);
        yield MenuItem::linkToCrud('VIP TripsAr', 'fas fa-suitcase-rolling', VIPTripsAR::class);
        yield MenuItem::linkToCrud('VIP TripsFr', 'fas fa-suitcase-rolling', VIPTripsFR::class);
        yield MenuItem::linkToCrud('Trip Images ', 'fas fa-suitcase-rolling', TripImages::class);
        yield MenuItem::section('Testimonials');
        yield MenuItem::linkToCrud('Testimonials', 'fas fa-scroll', Testimonials::class);
        yield MenuItem::linkToCrud('TestimonialsAr', 'fas fa-scroll', TestimonialsAR::class);
        yield MenuItem::linkToCrud('TestimonialsFr', 'fas fa-scroll', TestimonialsFR::class);
        yield MenuItem::section('Partners');
        yield MenuItem::linkToCrud('Partners', 'fas fa-handshake', Partners::class);
        yield MenuItem::section('Slider');
        yield MenuItem::linkToCrud('Slider', 'fas fa-film', Slider::class);
    }
}
