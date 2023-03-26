<?php

declare(strict_types=1);

namespace App\Fruit\Controller;

use App\Fruit\Entity\Fruit;
use App\Fruit\Entity\FruitNutrition;
use App\Fruit\Filter\FruitListFilter;
use App\Fruit\Service\FruitServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Fruit data controller
 */
#[Route('/api/v1/fruit')]
class FruitController extends AbstractController
{
    /**
     * Constructor
     *
     * @param FruitServiceInterface $fruitService
     */
    public function __construct(private readonly FruitServiceInterface $fruitService) {
    }

    /**
     * Returns a collection of fruits
     *
     * @param FruitListFilter $filter
     *
     * @return Response
     */
    #[Route('/', name: 'fruit:list')]
    public function getCollection(FruitListFilter $filter): Response
    {
        $collection = $this->fruitService->getCollection($filter);
        $total      = $this->fruitService->getTotal($filter);

        return $this->json(
            $this->getCollectionView($collection, $total),
        );
    }

    /**
     * Returns collection view for JSON response
     *
     * @param array $fruits
     * @param int   $total
     *
     * @return array
     */
    private function getCollectionView(array $fruits, int $total): array
    {
        return [
            'total' => $total,
            'items' => array_map([$this, 'getFruitView'], $fruits),
        ];
    }

    /**
     * Returns fruit view for JSON response
     *
     * @param Fruit $fruit
     *
     * @return array
     */
    private function getFruitView(Fruit $fruit): array
    {
        return [
            'id'         => $fruit->getId(),
            'name'       => $fruit->getName(),
            'family'     => $fruit->getFamily(),
            'genus'      => $fruit->getGenus(),
            'order'      => $fruit->getOrder(),
            'nutritions' => $this->getFruitNutritionsView($fruit->getNutritions()),
        ];
    }

    /**
     * Returns fruit nutritions for JSON response
     *
     * @param FruitNutrition $fruitNutrition
     *
     * @return array
     */
    private function getFruitNutritionsView(FruitNutrition $fruitNutrition): array
    {
        return [
            'carbohydrates' => $fruitNutrition->getCarbohydrates(),
            'fat'           => $fruitNutrition->getFat(),
            'calories'      => $fruitNutrition->getCalories(),
            'sugar'         => $fruitNutrition->getSugar(),
            'protein'       => $fruitNutrition->getProtein(),
        ];
    }
}
