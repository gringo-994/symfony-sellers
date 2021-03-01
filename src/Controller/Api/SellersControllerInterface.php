<?php

declare(strict_types=1);

namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface SellersControllerInterface
{
    public function sellersCheckIn(Request $request): Response;
}
