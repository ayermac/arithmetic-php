<?php
/**
 * Copyright (c) 2020,上海二三四五网络科技股份有限公司
 * 摘    要：字符串相关
 * 作    者：chenchao@2345.com
 * 修改日期：2021/2/20
 */
/**
 * 反转字符串
 * @param string $str 字符串
 * @return int|string
 * @author chenchao@2345.com
 */
function revStr($str)
{
    $str = (string)$str;
    if ($str == "") {
        return 0;
    }

    $revStr = "";
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $revStr .= $str[$i];
    }
    return $revStr;
}

echo revStr(123456);
