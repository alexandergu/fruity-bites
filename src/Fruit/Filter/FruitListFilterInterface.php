<?php

declare(strict_types=1);

namespace App\Fruit\Filter;

use App\Api\Filter\ListFilterInterface;

/**
 * Fruit list filter interface
 */
interface FruitListFilterInterface extends ListFilterInterface
{
    /**
     * Returns a family
     *
     * @return string
     */
    public function getFamily(): string;

    /**
     * Return a name
     *
     * @return string
     */
    public function getName(): string;
}
