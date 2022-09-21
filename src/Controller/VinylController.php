<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{

    #[Route('/', name: 'app_homepage')] //defines the url and points to this controller
    public function homepage(Environment $twig) :Response  //:Response eshte return type
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

       // dd($tracks);// dump and die

        $html = $twig->render('vinyl/homepage.html.twig',[
            'title' => 'Jams',
            'tracks2' => $tracks2,
            'tracks' => $tracks,
        ]);

        return new Response($html);
    }


    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null) :Response
    {

//        if ($slug) {
//            $title = 'Genre '.u(str_replace('-', ' ', $slug))->title(true);
//        }else{
//            $title = 'all genres';
//        }

        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null; //else null
        return $this->render('vinyl/browse.html.twig', [    //render a template
            'genre' => $genre,
        ]);
    }
}