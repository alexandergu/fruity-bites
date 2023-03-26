<?php

declare(strict_types=1);

namespace App\Fruit\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embedded;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * Fruit and its nutrients
 */
#[Entity]
#[Table(name: 'fruit')]
class Fruit
{
    /**
     * Identifier
     *
     * @var int|null
     */
    #[Id]
    #[GeneratedValue]
    #[Column]
    private ?int $id = null;

    /**
     * External ID
     *
     * @var int|null
     */
    #[Column(nullable: true)]
    private ?int $externalId;

    /**
     * Name
     *
     * @var string
     */
    #[Column(length: 255)]
    private string $name;

    /**
     * Family
     *
     * @var string
     */
    #[Column(length: 255)]
    private string $family;

    /**
     * Genus
     *
     * @var string
     */
    #[Column(length: 255)]
    private string $genus;

    /**
     * Order
     *
     * @var string
     */
    #[Column(name: '`order`', length: 255)]
    private string $order;

    /**
     * Nutritions
     *
     * @var FruitNutrition
     */
    #[Embedded(class: FruitNutrition::class, columnPrefix: false)]
    private FruitNutrition $nutritions;

    /**
     * Constructor
     *
     * @param FruitData $data
     */
    public function __construct(FruitData $data)
    {
        $this->externalId = $data->id ?: null;
        $this->name       = $data->name ?: '';
        $this->family     = $data->family ?: '';
        $this->genus      = $data->genus ?: '';
        $this->order      = $data->order ?: '';
        $this->nutritions = new FruitNutrition($data->nutritions ?? []);
    }

    /**
     * Returns a identifier
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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
     * Returns an external ID
     *
     * @return int|null
     */
    public function getExternalId(): ?int
    {
        return $this->externalId;
    }

    /**
     * Returns a genus
     *
     * @return string
     */
    public function getGenus(): string
    {
        return $this->genus;
    }

    /**
     * Returns a nutritions
     *
     * @return FruitNutrition
     */
    public function getNutritions(): FruitNutrition
    {
        return $this->nutritions;
    }

    /**
     * Returns an order
     *
     * @return string
     */
    public function getOrder(): string
    {
        return $this->order;
    }

    /**
     * Sets the ID
     *
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * Set the external ID
     *
     * @param int|null $externalId
     */
    public function setExternalId(?int $externalId): void
    {
        $this->externalId = $externalId;
    }

    /**
     * Sets the name
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Sets the family
     *
     * @param string $family
     */
    public function setFamily(string $family): void
    {
        $this->family = $family;
    }

    /**
     * Sets the genus
     *
     * @param string $genus
     */
    public function setGenus(string $genus): void
    {
        $this->genus = $genus;
    }

    /**
     * Sets the order
     *
     * @param string $order
     */
    public function setOrder(string $order): void
    {
        $this->order = $order;
    }

    /**
     * Sets the nutritions
     *
     * @param FruitNutrition $nutritions
     */
    public function setNutritions(FruitNutrition $nutritions): void
    {
        $this->nutritions = $nutritions;
    }
}
