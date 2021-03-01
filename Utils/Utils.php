<?php

declare(strict_types=1);

namespace App\Utils;

final class Utils implements ArrayUtilsInterface, CastUtilsInterface
{
    use ArrayUtilsTrait;
    use CastUtilsTrait;
}
