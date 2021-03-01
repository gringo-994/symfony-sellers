<?php

declare(strict_types=1);

namespace App\Manager;

use App\Exception\ValidationException;
use App\Logger\LoggerTrait;
use App\Serializer\SerializerAppInterface;
use App\Serializer\SerializerTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractManager implements ManagerInterface, SerializerAppInterface
{
    use LoggerTrait;
    use SerializerTrait;

    protected ValidatorInterface $validator;

    /**
     * AbstractManager constructor.
     */
    public function __construct(ValidatorInterface $validator, LoggerInterface $logger, SerializerInterface $serializer)
    {
        $this->validator = $validator;
        $this->logger = $logger;
        $this->serializer = $serializer;
    }

    /**
     * {@inheritDoc}
     *
     * @throws ValidationException
     */
    public function handleValidation($obj, $groups = null, $constraint = null): bool
    {
        $errors = $this->validator->validate($obj, $constraint, $groups);
        if ($errors->count() > 0) {
            throw new ValidationException($errors);
        }

        return true;
    }
}
