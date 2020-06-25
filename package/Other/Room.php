<?php
/**
 * 教室调度问题
 * -------------------------------------------------------------
 * 思路分析：贪心算法
 * -------------------------------------------------------------
 * 有N个课程，每个课程有开始时间和结束时间，将每个课程的开始时间依次排序，将课程依次排入教室。
 * 从第一个课程开始检查，后面课程的结束时间如果大于前面课程的开始时间，则该课程可以排入教室。
 * @author chenchao <codemac@163.com>
 * @date 2020/6/25
 */

$courseTime = [
    ['09:00', '09:30'],
    ['10:30', '11:00'],
    ['09:30', '10:30'],
    ['10:00', '11:00'],
    ['10:30', '11:30'],
    ['11:00', '12:00'],
    ['11:30', '12:00'],
];

function Room(array $courseTime)
{
    $count = count($courseTime);

    for ($j = 1; $j < $count; $j++) {
        for ($i = 0; $i < $count - $j; $i++) {
            if ($courseTime[$i][0] > $courseTime[$i + 1][0]) {
                $temp = $courseTime[$i];
                $courseTime[$i] = $courseTime[$i + 1];
                $courseTime[$i + 1] = $temp;
            }
        }
    }

    $cnt = 1;
    $class = [];
    $class[0] = $courseTime[0];
    for ($i = 0; $i < $count; $i++) {
        for ($j = 1; $j < $count; $j++) {
            if ($courseTime[$i][1] <= $courseTime[$j][0]) {
                $class[] = $courseTime[$j];
                $i = $j;
                $j = $j + 1;
                $cnt++;
            }
        }
    }
    echo $cnt;
    print_r($class);
    print_r($courseTime);

    return $courseTime;
}

Room($courseTime);
