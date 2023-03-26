<?php

declare(strict_types=1);

namespace App\Api\Filter;

use Symfony\Component\Validator\Constraints\PositiveOrZero;

/**
 * List filter
 */
class ListFilter implements ListFilterInterface
{
    /**
     * Limit
     *
     * @var int
     */
    #[PositiveOrZero]
    protected int $limit;

    /**
     * Offset
     *
     * @var int
     */
    #[PositiveOrZero]
    protected int $offset;

    /**
     * Constructor
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->limit  = intval($data['limit'] ?? 0);
        $this->offset = intval($data['offset'] ?? 0);
    }

    /**
     * Returns an offset
     *
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * Returns a limit
     *
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }
}
