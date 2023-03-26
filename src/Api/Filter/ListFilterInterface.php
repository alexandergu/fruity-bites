<?php

declare(strict_types=1);

namespace App\Api\Filter;

/**
 * List filter interface
 */
interface ListFilterInterface
{
    /**
     * Returns an offset
     *
     * @return int
     */
    public function getOffset(): int;

    /**
     * Returns a limit
     *
     * @return int
     */
    public function getLimit(): int;
}
