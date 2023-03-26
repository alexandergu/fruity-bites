<?php

declare(strict_types=1);

namespace App\Api\ValueResolver;

use App\Api\Filter\QueryFilterResolverInterface;
use Symfony\Component\HttpClient\Exception\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Resolver query-filters
 */
class QueryFilterResolver implements ValueResolverInterface
{
    /**
     * Contructor
     *
     * @param ValidatorInterface $validator
     */
    public function __construct(private readonly ValidatorInterface $validator)
    {
    }

    /**
     * Resolves the request params
     *
     * @param Request          $request
     * @param ArgumentMetadata $argument
     *
     * @return iterable
     */
    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        $argumentType = $argument->getType();

        if (!$argumentType
            || !is_subclass_of($argumentType, QueryFilterResolverInterface::class, true)
        ) {
            return [];
        }

        $obj = new $argumentType($request->query->all());
        $errors = $this->validator->validate($obj);

        if (count($errors) > 0) {
            throw new InvalidArgumentException(strval($errors));
        }

        return [$obj];
    }
}
