<?php

declare(strict_types=1);

namespace App\Manager;

interface ManagerInterface
{
    /**
     * @param $obj
     * @param null $groups
     * @param null $constraint
     * @return bool
     */
    public function handleValidation($obj, $groups = null, $constraint = null): bool;
}
