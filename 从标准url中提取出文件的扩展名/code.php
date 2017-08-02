<?php
// 从标准url中提取出文件的扩展名,这里考虑到可能有get参数
function fn($url)
{
    $start = strrpos($url,".") + 1;
    $end = strrpos($url,"?");
    $extendName = substr($url,$start,$end-$start);
    return $extendName;
}

//php打印出前一天的时间
function fn2()
{
    $date = new DateTime("-1day");
    echo $date->format('Y-m-d H:i:s');  //面向对象的方式
    
    echo date_format($date,"Y-m-d H:i:s"); //面向过程的方式
}



