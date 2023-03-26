<?php

declare(strict_types=1);

namespace App\Fruit\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embeddable;

/**
 * Fruit nutrition
 */
#[Embeddable]
class FruitNutrition
{
    /**
     * Carbohydrates
     *
     * @var float|null
     */
    #[Column(nullable: true)]
    private ?float $carbohydrates;

    /**
     * Protein
     *
     * @var float|null
     */
    #[Column(nullable: true)]
    private ?float $protein;

    /**
     * Fat
     *
     * @var float|null
     */
    #[Column(nullable: true)]
    private ?float $fat;

    /**
     * Calories
     *
     * @var float|null
     */
    #[Column(nullable: true)]
    private ?float $calories;

    /**
     * Sugar
     *
     * @var float|null
     */
    #[Column(nullable: true)]
    private ?float $sugar;

    /**
     * Constructor
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->carbohydrates = $data['carbohydrates'] ?? null;
        $this->protein       = $data['protein'] ?? null;
        $this->fat           = $data['fat'] ?? null;
        $this->calories      = $data['calories'] ?? null;
        $this->sugar         = $data['sugar'] ?? null;
    }

    /**
     * Returns a carbohydrates
     *
     * @return float|null
     */
    public function getCarbohydrates(): ?float
    {
        return $this->carbohydrates;
    }

    /**
     * Sets the carbohydrates
     *
     * @param float $carbohydrates
     */
    public function setCarbohydrates(float $carbohydrates): void
    {
        $this->carbohydrates = $carbohydrates;
    }

    /**
     * Returns a protein
     *
     * @return float|null
     */
    public function getProtein(): ?float
    {
        return $this->protein;
    }

    /**
     * Sets the carbohydrates
     *
     * @param float $protein
     */
    public function setProtein(float $protein): void
    {
        $this->protein = $protein;
    }

    /**
     * Returns a fat
     *
     * @return float|null
     */
    public function getFat(): ?float
    {
        return $this->fat;
    }

    /**
     * Sets the fat
     *
     * @param float $fat
     */
    public function setFat(float $fat): void
    {
        $this->fat = $fat;
    }

    /**
     * Returns a calories
     *
     * @return float|null
     */
    public function getCalories(): ?float
    {
        return $this->calories;
    }

    /**
     * Sets the calories
     *
     * @param float $calories
     */
    public function setCalories(float $calories): void
    {
        $this->calories = $calories;
    }

    /**
     * Returns a sugar
     *
     * @return float|null
     */
    public function getSugar(): ?float
    {
        return $this->sugar;
    }

    /**
     * Sets the sugar
     *
     * @param float $sugar
     */
    public function setSugar(float $sugar): void
    {
        $this->sugar = $sugar;
    }
}
