<?php

declare(strict_types=1);

namespace App\Fruit\Service;

use App\Fruit\Entity\Fruit;
use App\Fruit\Entity\FruitData;
use App\Fruit\Filter\FruitListFilterInterface;
use App\Fruit\Repository\FruitRepositoryInterface;

/**
 * Fruit service
 */
class FruitService implements FruitServiceInterface
{
    /**
     * Constructor
     *
     * @param FruitRepositoryInterface $fruitRepository
     */
    public function __construct(private readonly FruitRepositoryInterface $fruitRepository)
    {
    }

    /**
     * Returns a collection of fruits
     *
     * @param FruitListFilterInterface $filter
     *
     * @return array
     */
    public function getCollection(FruitListFilterInterface $filter): array
    {
        return $this->fruitRepository->getCollection($filter);
    }

    /**
     * Returns a counts of fruits
     *
     * @param FruitListFilterInterface $filter
     *
     * @return int
     */
    public function getTotal(FruitListFilterInterface $filter): int
    {
        return $this->fruitRepository->getTotal($filter);
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
        $fruit = new Fruit($data);
        $this->fruitRepository->save($fruit);

        return $fruit;
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
        $this->fruitRepository->save($fruit);
    }
}
