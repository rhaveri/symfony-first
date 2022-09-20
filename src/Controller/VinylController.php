<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController
{

    #[Route('/')] //defines the url and points to this controller
    public function homepage() :Response  //:Response eshte return type
    {
        return new Response('Title');
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