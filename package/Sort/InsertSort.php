<?php
/**
 * 插入排序
 * -------------------------------------------------------------
 * 思路分析：每步将一个待排序的纪录，按其关键码值的大小插入前面已经排序的文件中适当位置上，直到全部插入完为止。
 * -------------------------------------------------------------
 *
 * 算法适用于少量数据的排序，时间复杂度为O(n^2)。是稳定的排序方法。
 * 插入算法把要排序的数组分成两部分：第一部分包含了这个数组的所有元素，
 * 但将最后一个元素除外（让数组多一个空间才有插入的位置），而第二部分就只包含这一个元素（即待插入元素）。
 * 在第一部分排序完成后，再将这个最后元素插入到已排好序的第一部分中。
 * @author chenchao <codemac@163.com>
 * @date 2020/6/25
 */

/**
 * @param array $container
 * @return array
 * @author codemac@163.com
 */
function InsertSort(array $container): array
{
    $count = count($container);
    for ($i = 1; $i < $count; $i++) {
        $temp = $container[$i];
        $j = $i - 1;

        while ($j >= 0 && $container[$j] > $temp) {
            $container[$j + 1]= $container[$j];
            $j--;
        }

        if ($i != $j + 1) {
            $container[$j + 1] = $temp;
        }
    }

    return  $container;
}

print_r(InsertSort([3, 12, 42, 1, 24, 5, 346, 7]));
