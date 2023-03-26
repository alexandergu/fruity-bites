<?php

declare(strict_types=1);

namespace App\Fruit\Entity;

/**
 * Fruit data
 */
class FruitData
{
    /**
     * Identifier
     *
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Name
     *
     * @var string
     */
    public string $name = '';

    /**
     * Family
     *
     * @var string
     */
    public string $family = '';

    /**
     * Genus
     *
     * @var string
     */
    public string $genus = '';

    /**
     * Order
     *
     * @var string
     */
    public string $order = '';

    /**
     * Nutritions
     *
     * @var array
     */
    public array $nutritions = [];

    /**
     * Constructor
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id         = $data['id'] ?? null;
        $this->name       = $data['name'] ?? '';
        $this->family     = $data['family'] ?? '';
        $this->genus      = $data['genus'] ?? '';
        $this->order      = $data['order'] ?? '';
        $this->nutritions = $data['nutritions'] ?? [];
    }
}
