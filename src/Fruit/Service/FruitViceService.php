<?php

declare(strict_types=1);

namespace App\Fruit\Service;

use App\Fruit\Entity\Fruit;
use App\Fruit\Entity\FruitData;
use App\Fruit\Filter\FruitListFilterInterface;
use RuntimeException;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Throwable;

/**
 * FruitVice API integration service
 */
class FruitViceService implements FruitServiceInterface
{
    /**
     * Constructor
     *
     * @param HttpClientInterface $httpClient
     */
    public function __construct(private readonly HttpClientInterface $httpClient)
    {
    }

    /**
     * Return a collection of fruits
     *
     * @param FruitListFilterInterface $filter
     *
     * @return array
     */
    public function getCollection(FruitListFilterInterface $filter): array
    {
        try {
            $response = $this->httpClient->request('GET', '/api/fruit/all');
            $response = $response->toArray();
        } catch (Throwable $exception) {
            throw new RuntimeException(sprintf('Something went wrong: %s', $exception->getMessage()));
        }

        return $response;
    }

    /**
     * Creates the fruit
     *
     * @param FruitData $data
     *
     * @return Fruit
     */
    public function create(FruitData $data): Fruit
    {
        throw new RuntimeException('There is no implementation available.');
    }

    /**
     * Saves the fruit
     *
     * @param Fruit $fruit
     *
     * @return void
     */
    public function save(Fruit $fruit): void
    {
        throw new RuntimeException('There is no implementation available.');
    }
}
