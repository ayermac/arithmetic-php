<?php
/**
 * 冒泡排序
 * -------------------------------------------------------------
 * 思路分析：就是像冒泡一样，每次从数组当中 冒一个最大的数出来。 
 * -------------------------------------------------------------
 * 你可以这样理解：（从小到大排序）存在10个不同大小的气泡，
 * 由底至上的把较少的气泡逐步地向上升，这样经过遍历一次后最小的气泡就会被上升到顶（下标为0）
 * 然后再从底至上地这样升，循环直至十个气泡大小有序。
 * 在冒泡排序中，最重要的思想是两两比较，将两者较少的升上去
 * @author chenchao <codemac@163.com>
 * @date 2020/6/25
 */

/**
 * @param array $container
 * @return array
 * @author codemac@163.com
 */
function BubbleSort(array $container): array
{
    $count = count($container);
    for ($j = 1; $j < $count; $j++) {
        for ($i = 0; $i < $count - $j; $i++) {
            if ($container[$i] > $container[$i + 1]) {
                $temp = $container[$i];
                $container[$i] = $container[$i + 1];
                $container[$i + 1] = $temp;
            }
        }
    }
    return $container;
}

print_r(BubbleSort([4, 21, 41, 2, 53, 1, 213, 31, 21, 423]));
