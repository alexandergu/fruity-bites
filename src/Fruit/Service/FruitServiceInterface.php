<?php

declare(strict_types=1);

namespace App\Fruit\Service;

use App\Fruit\Entity\Fruit;
use App\Fruit\Entity\FruitData;
use App\Fruit\Filter\FruitListFilterInterface;

/**
 * Fruit service interface
 */
interface FruitServiceInterface
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
     * Creates the fruit
     *
     * @param FruitData $data
     *
     * @return Fruit
     */
    public function create(FruitData $data): Fruit;

    /**
     * Saves the fruit
     *
     * @param Fruit $fruit
     *
     * @return void
     */
    public function save(Fruit $fruit): void;
}
