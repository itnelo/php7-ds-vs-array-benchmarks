<?php

declare(strict_types=1);

namespace PhpArrayVsDsBenchmarks\Benchmark;

use Ds\PriorityQueue;
use PhpArrayVsDsBenchmarks\TimePoint;

class DsPriorityQueue
{
    /**
     * @param TimePoint[] $timePoints
     *
     * @return void
     */
    public function run(array $timePoints): void
    {
        $occurrenceMap = [0 => new PriorityQueue(), 1 => new PriorityQueue()];

        foreach ($timePoints as $timePoint) {
            $timePointStatus    = (int) $timePoint->getStatus();
            $timePointTimestamp = $timePoint->getTimestamp();

            // В ходе заполнения мапов строим дерево, цена пуша O(log(N)).
            // Каждый элемент при вставке найдет свою позицию согласно приоритету, т.е. на выходе будут 2
            // аналогичных коллекции с объектами, отсортированные по убыванию timestamp.
            $occurrenceMap[$timePointStatus]->push($timePoint, -$timePointTimestamp);
        }

        // Начинаем вытаскивать элементы массива, от меньшего timestamp к большему и... что-то потом с ними делать :)
        while (!$occurrenceMap[1]->isEmpty()) {
            $timePoint = $occurrenceMap[1]->pop(); // O(1)
        }

        /*
         * Running 'PhpArrayVsDsBenchmarks\Benchmark\DsPriorityQueue'
         * Objects count: 10000
         *
         * 22.33315 ms
         */
    }
}
