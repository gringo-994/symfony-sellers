<?php

declare(strict_types=1);

namespace App\Manager;

interface ManagerInterface
{
    /**
     * @param $obj
     * @param null $groups
     * @param null $constraint
     */
    public function handleValidation($obj, $groups = null, $constraint = null): bool;
}
