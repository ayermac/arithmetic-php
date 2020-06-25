<?php
/**
 * 选择排序
 *
 * -------------------------------------------------------------
 * 思路分析：选择排序是不稳定的排序方法
 * 大O表示： O(n 2)
 * -------------------------------------------------------------
 * 它的工作原理是每一次从待排序的数据元素中选出最小（或最大）的一个元素，存放在序列的起始位置，直到全部待排序的数据元素排完。
 * 选择排序是不稳定的排序方法（比如序列[5， 5， 3]第一次就将第一个[5]与[3]交换，导致第一个5挪动到第二个5后面）。
 * @author chenchao <codemac@163.com>
 * @date 2020/6/25
 */

/**
 * @param array $container
 * @return array
 * @author codemac@163.com
 */
function SelectSort(array $container): array
{
    $count = count($container);
    for ($i = 0; $i < $count; $i++) {
        $k = $i;

        for ($j = $i + 1; $j < $count; $j++) {
            if ($container[$j] < $container[$k]) {
                $k = $j;
            }
        }

        if ($k != $i) {
            $temp = $container[$i];
            $container[$i] = $container[$k];
            $container[$k] = $temp;
        }
    }

    return  $container;
}

print_r(SelectSort([3, 12, 42, 1, 24, 5, 346, 7]));
