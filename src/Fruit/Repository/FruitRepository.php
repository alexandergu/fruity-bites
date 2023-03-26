<?php

declare(strict_types=1);

namespace App\Fruit\Repository;

use App\Fruit\Entity\Fruit;
use App\Fruit\Filter\FruitListFilterInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Fruit repository
 */
class FruitRepository extends ServiceEntityRepository implements FruitRepositoryInterface
{
    /**
     * Constructor
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fruit::class);
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
        return $this->findAll();
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
        $em = $this->getEntityManager();
        $em->persist($fruit);
        $em->flush();
    }

}
