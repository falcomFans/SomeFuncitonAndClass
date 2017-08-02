<?php
// 将多维混合数组的首字母大写
function fn($array)
{
    $arr = [];
    foreach ($array as  $value) 
    {
        if(is_array($value))
        {
            $arr[] = fn($value);
        }
        else
        {
            $arr[] =ucfirst($value);
        }     
    }
    return $arr;
}
