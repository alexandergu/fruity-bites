<?php

declare(strict_types=1);

namespace App\Fruit\Controller;

use App\Fruit\Entity\Fruit;
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
        $list = $this->fruitService->getCollection($filter);

        return $this->json(array_map(function (Fruit $item) {
            return [
                'id' => $item->getId(),
            ];
        }, $list));
    }
}
