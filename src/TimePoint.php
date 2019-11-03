<?php

declare(strict_types=1);

namespace PhpArrayVsDsBenchmarks;

class TimePoint
{
    /**
     * @var int
     */
    private $status;

    /**
     * @var int
     */
    private $timestamp;

    /**
     * TimePoint constructor.
     *
     * @param int $status
     * @param int $timestamp
     */
    public function __construct(int $status, int $timestamp)
    {
        $this->status    = $status;
        $this->timestamp = $timestamp;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }
}
