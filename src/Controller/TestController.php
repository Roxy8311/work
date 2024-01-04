<?php
namespace App\Controller;

use App\Repository\ConferenceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
class TestController
{


    #[Route('/test', name: 'test1')]
    public function number(): Response
    {
        $number = random_int(0, 100);
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
    #[Route('/test2', name: 'test2')]
    public function index(Environment $twig, ConferenceRepository $conferenceRepository): Response
    {
        return new Response($twig->render('conference/index.html.twig', [
            'conferences' => $conferenceRepository->findAll(),
            ]));
    }

}