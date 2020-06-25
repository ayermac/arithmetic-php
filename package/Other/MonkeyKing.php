<?php
/**
 * 猴子选大王
 * -------------------------------------------------------------
 * 思路分析：约瑟夫环问题
 * -------------------------------------------------------------
 * 有M个monkey ，转成一圈，第一个开始数数，数到第N个出圈，下一个再从1开始数，再数到第N个出圈，直到圈里只剩最后一个就是大王
 * @author chenchao <codemac@163.com>
 * @date 2020/6/25
 */

class MonkeyKing
{
    protected $next;
    protected $name;

    /**
     * MonkeyKing constructor.
     *
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function whoIsKing($count, $num)
    {
        // 构造单项循环列表
        $current = $first = new self(1);
        for ($i = 2; $i <= $count; $i++) {
            $current->next = new self($i);
            $current = $current->next;
        }
        // 最后一个指向第一个
        $current->next = $first;
        // 指向第一个
        $current = $first;
        $cn = 1;
        while ($current !== $current->next) {
            $cn++;
            if ($cn == $num) {
                $current->next = $current->next->next;
                $cn = 1;
            }
            $current = $current->next;
        }

        return $current->name;
    }
}

//echo MonkeyKing::whoIsKing(10, 5) . PHP_EOL;

/**
 * whoIsKing
 * f(n) = (f(n - 1) + m) % n;
 * @param $n
 * @param $m
 * @return int
 */
function whoIsKing($n, $m)
{
    $r = 0;
    for ($i = 2; $i <= $n; $i++) {
        $r = ($r + $m) % $i;
    }

    return $r + 1;
}

echo whoIsKing(10, 5) . PHP_EOL;

/**
 * king
 *
 * @param $n
 * @param $m
 * @return mixed
 */
function king($n, $m)
{
    $monkeys = range(1, $n);
    $i = 0;
    while (count($monkeys) > 1) {
        print_r($monkeys);
        if (($i + 1) % $m == 0) {
            unset($monkeys[$i]);
        } else {
            array_push($monkeys, $monkeys[$i]);
            unset($monkeys[$i]);
        }
        $i++;
    }
    echo $i;
    return current($monkeys);
}

//echo king(10, 3) . PHP_EOL;
//echo (2+1)%3;
