<?php

declare(strict_types=1);

namespace App\Utils;

class Utils implements ArrayUtilsInterface, CastUtilsInterface
{
    use ArrayUtilsTrait;
    use CastUtilsTrait;
}
