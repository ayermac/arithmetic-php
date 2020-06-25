<?php
/**
 * 斐波那契查询
 * -------------------------------------------------------------
 * 思路分析：斐波那契查找 利用黄金分割原理
 * -------------------------------------------------------------
 * $num == $container[$mid],直接返回
 * $num <  $container[$mid],新范围是第 $low   个到 $mid-1 个，此时范围个数为 produced($key-1)-1 个
 * $num >  $container[$mid],新范围是第 $mid+1 个到 $high  个，此时范围个数为 produced($key-2)-1 个
 * @author chenchao <codemac@163.com>
 * @date 2020/6/25
 */

class FibonacciQuery
{

}
