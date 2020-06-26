<?php
/**
 * 斐波那契数列
 * @author chenchao <codemac@163.com>
 * @date 2020/6/26
 */
/**
 * 递归
 * @param int $n
 * @return int
 * @author codemac@163.com
 */
function Fibonacci(int $n)
{
    if ($n == 0) {
        return 0;
    }

    if ($n == 1) {
        return 1;
    }
    return Fibonacci($n - 1) + Fibonacci($n - 2);
}

/**
 * 动态规划
 * @param int $n
 * @return int
 * @author codemac@163.com
 */
function FibonacciDP(int $n)
{
    $memo = [];
    $memo[0] = 0;
    $memo[1] = 1;

    for ($i = 2; $i <= $n; $i++) {
        $memo[$i] = $memo[$i - 1] + $memo[$i - 2];
    }

    print_r($memo);
    return $memo[$n];
}

$t1 = microtime(true);
//echo Fibonacci(20) . PHP_EOL;
echo FibonacciDP(5) . PHP_EOL;
$t2 = microtime(true);
echo '耗时'.round($t2-$t1,6) . PHP_EOL;
echo 'Now memory_get_usage: ' . memory_get_usage() . PHP_EOL;
