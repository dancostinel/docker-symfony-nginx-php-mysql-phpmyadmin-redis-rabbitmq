<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AppController
{
    #[Route(path: '/home', name: 'app_home', methods: ['GET'])]
    public function __invoke(): Response
    {
        return new Response('homepage');
    }
}
