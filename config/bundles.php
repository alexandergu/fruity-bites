<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class            => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class             => ['all' => true],
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class => ['all' => true],
    App\Fruit\FruitBundle::class                                     => ['all' => true],
    App\Api\ApiBundle::class                                         => ['all' => true],
];
