<?php
/**
 * 二分查找
 * -------------------------------------------------------------
 * 思路分析：数组中间的值floor((low+top)/2) 
 * -------------------------------------------------------------
 * 先取数组中间的值floor((low+top)/2)然后通过与所需查找的数字进行比较，
 * 若比中间值大则将首值替换为中间位置下一个位置，继续第一步的操作；
 * 若比中间值小，则将尾值替换为中间位置上一个位置，继续第一步操作
 * 重复第二步操作直至找出目标数字
 * @author chenchao <codemac@163.com>
 * @date 2020/6/25
 */

/**
 * 非递归版二分查找
 * @param array $container
 * @param int $search
 * @return int|string
 * @author codemac@163.com
 */
function BinaryQuery(array $container, int $search)
{
    $top = count($container);
    $low = 0;

    while ($low <= $top) {
        $mid = intval(floor(($low + $top) / 2));
        echo $mid . PHP_EOL;
        if (!isset($container[$mid])) {
            return 'NOT FOUND';
        }

        if ($container[$mid] == $search) {
            return  $mid;
        }
        $container[$mid] < $search && $low = $mid + 1;
        $container[$mid] > $search && $top = $mid - 1;
     }

}

print_r(BinaryQuery([0, 1, 2, 3, 4, 5, 6, 7, 8, 9], 5));

echo PHP_EOL . "===========" . PHP_EOL;

/**
 * 递归版二分查找
 * @param array $container
 * @param $search
 * @param int $low
 * @param string $top
 * @author codemac@163.com
 * @return int|string
 */
function BinaryQueryRecursive(array $container, int $search, int $low = 0, $top = 'default')
{
    $top == 'default' && $top = count($container);
    if ($low <= $top) {
        $mid = intval(floor(($low + $top) / 2));
        echo $mid . PHP_EOL;
        if (!isset($container[$mid])) {
            return 'NOT FOUND';
        }

        if ($container[$mid] == $search) {
            return $mid;
        }

        if ($container[$mid] < $search) {
            return BinaryQueryRecursive($container, $search, $mid + 1, $top);
        } else {
            return BinaryQueryRecursive($container, $search, $low, $mid - 1);
        }
    }
}

print_r(BinaryQueryRecursive([0, 1, 2, 3, 4, 5, 6, 7, 8, 9], 5));
