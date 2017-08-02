<?php
/**发红包，随机红包
* @param number $totalMoney 总额
* @param number $perNum 份数
*/
function sendMoney($totalMoney,$perNum)
{
    $arr = [];
    $perMoney = $totalMoney / $perNum;
    $to = $totalMoney;
    for ($i=1; $i < $perNum ; $i++) { 
        $per = $perMoney*(mt_rand(50,150)/100);
        $to -= $per;
        $arr[] = $per;
    }
    if ($to <= 0) {
        $arr = sendMoney($totalMoney,$perNum);
    }
    else 
    {
        $arr[] = $to;
    }
    return $arr;
}

