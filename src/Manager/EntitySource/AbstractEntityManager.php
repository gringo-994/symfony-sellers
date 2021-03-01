<?php

declare(strict_types=1);

namespace App\Manager\EntitySource;

use App\Entity\EntityInterface;
use App\Manager\AbstractManager;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManagerInterface;
use LogicException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractEntityManager extends AbstractManager implements ManagerEntityInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $em;

    /**
     * @var string
     */
    protected string $classEntity;

    /**
     * AbstractEntityManager constructor.
     * @param ValidatorInterface $validator
     * @param LoggerInterface $logger
     * @param EntityManagerInterface $em
     * @param SerializerInterface $serializer
     * @param string $classEntity
     */
    public function __construct(
        ValidatorInterface $validator,
        LoggerInterface $logger,
        EntityManagerInterface $em,
        SerializerInterface $serializer,
        string $classEntity
    ) {
        parent::__construct($validator, $logger, $serializer);
        $this->em = $em;
        $this->classEntity = $classEntity;
    }

    /**
     *{@inheritDoc}
     */
    public function findAll(): array
    {
        $repository = $this->em->getRepository($this->classEntity);

        return $repository->findAll();
    }

    /**
     *{@inheritDoc}
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null): array
    {
        $repository = $this->em->getRepository($this->classEntity);

        return $repository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     *{@inheritDoc}
     */
    public function find($id): ?EntityInterface
    {
        $repository = $this->em->getRepository($this->classEntity);
        $obj = $repository->find($id);
        if ($obj instanceof EntityInterface) {
            return $obj;
        }
        throw new LogicException('the entity must implements EntityInterface');
    }

    /**
     *{@inheritDoc}
     */
    public function matching(Criteria $query): array
    {
        $repository = $this->em->getRepository($this->classEntity);

        return $repository->matching($query)->toArray();
    }

    /**
     *{@inheritDoc}
     */
    public function persist(EntityInterface $entity, $flush = false): EntityInterface
    {
        $this->handleValidation($entity);

        if ($flush) {
            $this->em->flush();
        }

        return $entity;
    }

    /**
     *{@inheritDoc}
     */
    public function flush(): void
    {
        $this->em->flush();
    }
    /**
     *{@inheritDoc}
     */
    public function findOneBy(array $expression): ?EntityInterface
    {
        $repository = $this->em->getRepository($this->classEntity);
        $obj = $repository->findOneBy($expression);
        if ($obj instanceof EntityInterface) {
            return $obj;
        }
        throw new LogicException('the entity must implements EntityInterface');
    }

    /**
     *{@inheritDoc}
     */
    public function remove(EntityInterface $entity): void
    {
        $this->em->remove($entity);
        $this->em->flush();
    }
}
