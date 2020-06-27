<?php
/**
 * HanoiGames
 * -------------------------------------------------------------
 * 思路分析：
 * -------------------------------------------------------------
 * 汉诺塔（又称河内塔）问题是印度的一个古老的传说。
 * 开天辟地的神勃拉玛在一个庙里留下了三根金刚石的棒，
 * 第一根上面套着64个圆的金片，最大的一个在底下，其余一个比一个小，依次叠上去，
 * 庙里的众僧不倦地把它们一个个地从这根棒搬到另一根棒上，规定可利用中间的一根棒作为帮助，
 * 但每次只能搬一个，而且大的不能放在小的上面。
 * 面对庞大的数字(移动圆片的次数)18446744073709551615，看来，众僧们耗尽毕生精力也不可能完成金片的移动。
 * 后来，这个传说就演变为汉诺塔游戏:
 * 1.有三根杆子A,B,C。A杆上有若干碟子
 * 2.每次移动一块碟子,小的只能叠在大的上面
 * 3.把所有碟子从A杆全部移到C杆上
 * 经过研究发现，汉诺塔的破解很简单，就是按照移动规则向一个方向移动金片：
 * 如3阶汉诺塔的移动：A→C,A→B,C→B,A→C,B→A,B→C,A→C
 * 此外，汉诺塔问题也是程序设计中的经典递归问题。
 * @author chenchao <codemac@163.com>
 * @date 2020/6/26
 */
/**
 * HanoiGames
 *
 * @param $n
 * @param $a
 * @param $b
 * @param $c
 */
function HanoiGames($n, $a, $b, $c)
{
    if ($n == 1) {
        echo 'move disk 1 from ' . $a . ' to ' . $c . "\n";
    } else {
        HanoiGames($n - 1, $a, $c, $b);
        echo 'move disk ' . $n . ' from ' . $a . ' to ' . $c . "\n";
        HanoiGames($n - 1, $b, $a, $c);
    }
}

HanoiGames(2, 'A', 'B', 'C');