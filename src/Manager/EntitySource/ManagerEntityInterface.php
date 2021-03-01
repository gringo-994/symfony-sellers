<?php

declare(strict_types=1);

namespace App\Manager\EntitySource;

use App\Entity\EntityInterface;
use App\Exception\ValidationException;
use Doctrine\Common\Collections\Criteria;

interface ManagerEntityInterface
{
    /**
     * @return EntityInterface[]
     */
    public function findAll(): array;

    /**
     * @param null $limit
     * @param null $offset
     *
     * @return EntityInterface[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null): array;

    /**
     * @param $id
     */
    public function find($id): ?EntityInterface;

    /**
     * @return EntityInterface[]
     */
    public function matching(Criteria $query): array;

    /**
     * @param false $flush
     *
     * @throws ValidationException
     */
    public function persist(EntityInterface $entity, $flush = false): EntityInterface;

    public function flush(): void;

    public function remove(EntityInterface $entity): void;
}
