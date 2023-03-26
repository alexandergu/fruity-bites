<?php

declare(strict_types=1);

namespace App\Fruit\Filter;

use App\Api\Filter\ListFilter;
use App\Api\Filter\QueryFilterResolverInterface;

/**
 * Fruit list filter
 */
class FruitListFilter extends ListFilter implements FruitListFilterInterface, QueryFilterResolverInterface
{
    /**
     * Family
     *
     * @var string
     */
    protected string $family;

    /**
     * Name
     *
     * @var string
     */
    protected string $name;

    /**
     * Constructor
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->family = strval($data['family'] ?? '');
        $this->name   = strval($data['name'] ?? '');
    }

    /**
     * Returns a family
     *
     * @return string
     */
    public function getFamily(): string
    {
        return $this->family;
    }

    /**
     * Returns a name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
