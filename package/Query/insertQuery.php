<?php
/**
 * 插入查询
 * -------------------------------------------------------------
 * 思路分析：对于数组长度比较大，关键字分布又是比较均匀的来说，插值查找的效率比折半查找的效率高
 * -------------------------------------------------------------
 * 它是二分查找的改进。
 * 在英文词典里查找“apple”，你下意识里翻开词典是翻前面的书页还是后面的书页呢？如果再查“zoo”,你又会怎么查？
 * 显然你不会从词典中间开始查起，而是有一定目的地往前或往后翻。
 * @author chenchao <codemac@163.com>
 * @date 2020/6/25
 */

/**
 * @param array $container
 * @param int $num
 * @return bool|float|int
 * @author codemac@163.com
 */
function insertQuery(array $container, int $num)
{
    $count = count($container);
    $lower = 0;
    $high = $count - 1;
    echo $high . PHP_EOL;

    while ($lower <= $high) {
        if ($container[$lower] == $num) {
            return $lower;
        }

        if ($container[$high] == $num) {
            return $high;
        }

        $left = intval($lower + ($num - $container[$lower]) * ($high - $lower));
        $right = $container[$high] - $container[$lower];

        $middle = intval($left / $right);

        echo $left . '====' . $right . '====' . $middle . PHP_EOL;
        echo $lower . '====' . $high . '====' . $middle . PHP_EOL;
        if ($num < $container[$middle]) {
            $high  = $middle - 1;
        } else if ($num > $container[$middle]) {
            $lower = $middle + 1;
        } else {
            return $middle;
        }
    }

    return false;
}

echo insertQuery([4, 5, 7, 8, 9, 10, 11, 15, 16, 18, 20, 21, 22, 23], 20);
