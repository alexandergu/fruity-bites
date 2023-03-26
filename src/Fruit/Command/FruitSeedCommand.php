<?php

declare(strict_types=1);

namespace App\Fruit\Command;

use App\Fruit\Entity\FruitData;
use App\Fruit\Filter\FruitListFilter;
use App\Fruit\Service\FruitServiceInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Throwable;

/**
 * Command for fetching and storing fruit data
 */
#[AsCommand(name: 'fruits:seed')]
class FruitSeedCommand extends Command
{
    /**
     * Constructor
     *
     * @param FruitServiceInterface $externalService
     * @param FruitServiceInterface $internalService
     * @param ValidatorInterface    $validator
     */
    public function __construct(
        private readonly FruitServiceInterface $externalService,
        private readonly FruitServiceInterface $internalService,
        private readonly ValidatorInterface $validator,
    ) {
        parent::__construct();
    }

    /**
     * Executes the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filter = new FruitListFilter();
        $list = $this->externalService->getCollection($filter);

        $output->writeln(sprintf('Received %s fruits.', count($list)));

        $invalid       = 0;
        $processFruits = [];

        foreach ($list as $fruit) {
            $fruitData = new FruitData($fruit);
            $errors = $this->validator->validate($fruitData);

            if (count($errors) > 0) {
                $invalid++;
            }

            $processFruits[] = $fruitData;
        }

        $output->writeln(sprintf('From the received fruits %s are invalid.', $invalid));

        $saved  = 0;
        $failed = 0;

        foreach ($processFruits as $fruit) {
            try {
                $this->internalService->create($fruit);
                $saved++;
            } catch (Throwable $exception) {
                $failed++;
            }
        }

        $output->writeln('Command executed successfully.');
        $output->writeln(sprintf('Successfully added %s fruits. With %s fruits failed to add.', $saved, $failed));

        return 1;
    }
}
