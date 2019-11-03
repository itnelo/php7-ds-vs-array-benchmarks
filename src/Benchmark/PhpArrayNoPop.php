<?php

declare(strict_types=1);

namespace PhpArrayVsDsBenchmarks\Benchmark;

use PhpArrayVsDsBenchmarks\TimePoint;

class PhpArrayNoPop
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

        $indexForLookup = count($occurrenceMap[1]);

        // Начинаем вытаскивать элементы массива, от меньшего timestamp к большему и... что-то потом с ними делать :)
        // Только чтение, без удаления элемента из коллекции.
        while (--$indexForLookup) {
            $timePoint = $occurrenceMap[1][$indexForLookup]; // O(1)
        }
    }
}
