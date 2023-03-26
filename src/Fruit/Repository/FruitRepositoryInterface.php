<?php

declare(strict_types=1);

namespace App\Fruit\Repository;

use App\Fruit\Entity\Fruit;
use App\Fruit\Filter\FruitListFilterInterface;

/**
 * Fruit repository interface
 */
interface FruitRepositoryInterface
{
    /**
     * Returns a collection of fruits
     *
     * @param FruitListFilterInterface $filter
     *
     * @return array
     */
    public function getCollection(FruitListFilterInterface $filter): array;

    /**
     * Returns a counts of fruits
     *
     * @param FruitListFilterInterface $filter
     *
     * @return int
     */
    public function getTotal(FruitListFilterInterface $filter): int;

    /**
     * Saves the fruit
     *
     * @param Fruit $fruit
     *
     * @return void
     */
    public function save(Fruit $fruit): void;
}
