<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{

    #[Route('/')] //defines the url and points to this controller
    public function homepage() :Response  //:Response eshte return type
    {

        $tracks2 = [
            'Gangsta\'s Paradise - Coolio',
            'Waterfalls - TLC',
            'Creep - Radiohead',
            'Kiss from a Rose - Seal',
            'On Bended Knee - Boyz II Men',
            'Fantasy - Mariah Carey',
        ];

        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];

        return $this->render('vinyl/homepage.html.twig',[
            'title' => 'Jams',
            'tracks2' => $tracks2,
            'tracks' => $tracks,
        ]);
    }


    #[Route('/browse/{slug}')]
    public function browse(string $slug = null) :Response
    {

        if ($slug) {
            $title = 'Genre '.u(str_replace('-', ' ', $slug))->title(true);
        }else{
            $title = 'all genres';
        }
        return new Response($title);
    }
}