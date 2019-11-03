<?php

declare(strict_types=1);

namespace PhpArrayVsDsBenchmarks\Benchmark;

use PhpArrayVsDsBenchmarks\TimePoint;

class PhpArray
{
    /**
     * @param TimePoint[] $timePoints
     *
     * @return void
     */
    public function run(array $timePoints): void
    {
        // Сортируем по timestamp, в убывающем порядке, т.к. хотим использовать array_pop с O(1).
        usort(
            $timePoints,
            function (TimePoint $left, TimePoint $right) {
                return $right->getTimestamp() <=> $left->getTimestamp();
            }
        );

        $occurrenceMap = [0 => [], 1 => []];

        // Собираем все онлайны в один массив, оффлайны - в другой.
        foreach ($timePoints as $timePoint) {
            $timePointStatus = (int) $timePoint->getStatus();

            $occurrenceMap[$timePointStatus][] = $timePoint;
        }

        // Начинаем вытаскивать элементы массива, от меньшего timestamp к большему и... что-то потом с ними делать :)
        while (!empty($occurrenceMap[1])) {
            $timePoint = array_pop($occurrenceMap[1]); // O(1)
        }

        /*
         * Running 'PhpArrayVsDsBenchmarks\Benchmark\PhpArray'
         * Objects count: 10000
         *
         * 251.00493 ms
         */
    }
}
