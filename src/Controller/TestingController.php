<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class TestingController
{
    #[Route(path: '/test')]
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(['message' => __METHOD__]);
    }
}
