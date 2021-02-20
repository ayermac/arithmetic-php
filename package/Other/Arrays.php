<?php
/**
 * Copyright (c) 2020,上海二三四五网络科技股份有限公司
 * 摘    要：数组相关
 * 作    者：chenchao@2345.com
 * 修改日期：2021/2/20
 */
/**
 * 两数之和
 * @param array $array 给定数组
 * @param int $target 目标值
 * @return array
 * @author chenchao@2345.com
 */
function TwoSum($array, $target)
{
    $index = [];
    $count = count($array);
    for ($i = 0; $i < $count; $i++) {
        echo $i . "===" . PHP_EOL;
        for ($j = $i + 1; $j < $count; $j++) {
            echo $j . PHP_EOL;
            if ($array[$i] + $array[$j] == $target) {
                $index[] = $i;
                $index[] = $j;
                break;
            }
        }

        if ($index) {
            break;
        }
    }
    return $index;
}

//print_r(TwoSum([1, 3, 4, 5], 5));

/**
 * 两数之和Map解法
 * @param array $array 给定数组
 * @param int $target 目标值
 * @return array
 * @author chenchao@2345.com
 */
function TwoSumMap($array, $target)
{
    $index = [];
    $count = count($array);
    for ($i = 0; $i < $count; $i++) {
        $diff = $target - $array[$i];
        if (isset($index[$diff])) {
            return [$index[$diff], $i];
        }
        $index[$array[$i]] = $i;
    }
}
//print_r(TwoSumMap([1, 3, 4, 5], 6));

/**
 * 只出现一次的数字
 * @param array $array 数组
 * @author chenchao@2345.com
 * @return int
 */
function SingleNum($array)
{
    $count = count($array);
    $ret = 0;

    for ($i = 0; $i < $count; $i++) {
        $ret ^= $array[$i];
        echo $ret . PHP_EOL;
    }

    return $ret;
}

//echo SingleNum([2, 2, 3, 4, 4]);

/**
 * 最佳股票买卖时机
 * @param array $prices 价格
 * @return int|mixed
 * @author chenchao@2345.com
 */
function BuyAndSellStock($prices)
{
    if (empty($prices)) {
        return 0;
    }

    $minPrice = $prices[0];
    $maxProfit = 0;

    // 7 1 5 3 6 4
    for ($i = 1; $i <= count($prices); $i++) {
        if ($prices[$i] > $prices[$i - 1]) {
            $maxProfit = max([$maxProfit, $prices[$i] - $minPrice]);
        } else {
            $minPrice = min([$minPrice, $prices[$i]]);
        }
    }

    return $maxProfit;
}
