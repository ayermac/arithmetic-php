<?php
/**
 * 动态规划
 * -------------------------------------------------------------
 * 思路分析：动态规划原理思想，max(opt(i-1,w),wi+opt(i-1,w-wi)) 当中最大值，opt(i-1,w-wi)指上一个最优解
 * -------------------------------------------------------------
 * 一个承受最大重量为W的背包，现在有n个物品，每个物品重量为t, 每个物品的价值为v。
 * 要使得这个背包重量最大(但不能超过W),同时又需要背包的价值最大
 * @author chenchao <codemac@163.com>
 * @date 2020/6/26
 */

/**
 * @param int $packageWeight 背包最大可承载重量
 * @param array $goods 商品重量
 * @param array $value 价值
 * @author codemac@163.com
 * @return int
 */
function DynamicProgramming(int $packageWeight, array $goods, array $value)
{
    $container = [];
    $goodsCount = count($goods);

    // 初始化矩阵
    for ($i = 0; $i <= $packageWeight; $i++) {
        $container[0][$i] = 0;
    }
    for ($j = 0; $j <= $goodsCount; $j++) {
        $container[$j][0] = 0;
    }
    print_r($container);
    for ($j = 1; $j <= $goodsCount; $j++) {
        for ($i = 1; $i <= $packageWeight; $i++) {
            $container[$j][$i] = $container[$j - 1][$i];
            //不大于最大的w=15
            if ($goods[$j - 1] <= $packageWeight) {
                if (!isset($container[$j - 1][$i - $goods[$j - 1]])) {
                    continue;
                }
                //wi+opt(i-1,wi)
                $tmp = $container[$j - 1][$i - $goods[$j - 1]] + $value[$j - 1];
                //opt(i-1,w),wi+opt(i-1,w-wi) => 进行比较
                if ($tmp > $container[$j][$i]) {
                    $container[$j][$i] = $tmp;
                }
            }
        }
    }

    return $container[$j - 1][$i - 1];
}

echo DynamicProgramming(15, [3, 4, 5, 6], [8, 7, 4, 9]);
