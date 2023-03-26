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
        $qb = $this->createQueryBuilder('p');

        if ($limit = $filter->getLimit()) {
            $qb->setMaxResults($limit);
        }

        if ($offset = $filter->getOffset()) {
            $qb->setFirstResult($offset);
        }

        if ($family = $filter->getFamily()) {
            $qb
                ->andWhere($qb->expr()->eq('p.family', ':family'))
                ->setParameter('family', $family);
        }

        if ($name = $filter->getName()) {
            $qb
                ->andWhere($qb->expr()->eq('p.name', ':name'))
                ->setParameter('name', $name);
        }

        return $qb->getQuery()->execute();
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
