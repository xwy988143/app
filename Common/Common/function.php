<?php

/**
 * 后台管理密码加密
 * @param $password
 * @return string
 */
function password_md5($password)
{
    return md5($password);
}

/**
 * 返回结构树
 * @Date   2015-10-10
 * @param  array     $array 二维数组
 * @return array            二维数组
 */
function generateTree($array, $pid = 0, $html = '|-- '){
    $arr = array();
    foreach($array as $v){
        if($v['pid'] == $pid){
            $v['html'] = $html;
            $arr[] = $v;
            $arr = array_merge($arr, generateTree($array, $v['id'], '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$html));
        }
    }
    return $arr;
}

/**
 * 验证数据列表是否为空
 * @Date   2015-10-10
 * @param  array     $list 列表数据
 * @param  int     $num  td数
 * @param  string     $str  如果为空的提示信息
 */
function checkListEmpty($list, $num, $str = '无数据!'){
    if(empty($list)){
        echo '<tr><td colspan="'.$num.'" align="center" style="color:#666;font-size:15px;">'.$str.'</td></tr>';
    }
}

//返回原图
function return_original_img($thumb_img){
    return str_replace('thumb_','',$thumb_img);
}

/**
 * 验证字段是否存在
 * @param  string $tableName 表名
 * @param  string $fieldName 字段名
 * @param  string $fieldValue 字段值
 * @param  string $condition 附加条件
 * @return bool        存在返回true
 */
function check_repeat_field($tableName, $fieldName, $fieldValue, $condition=""){
    return M($tableName)->where("`{$fieldName}`='{$fieldValue}'{$condition}")->count() ? true : false;
}



/**
 * 返回完整路径
 * @param  string $url 地址
 * @return string      完整地址
 */
function completeUrl($url){
    return stristr($url, 'http://') ? $url : "http://{$_SERVER['HTTP_HOST']}{$url}";
}

//经纬度测距
function getDistance($lat1, $lng1, $lat2, $lng2){
    $earthRadius = 6367000;
    $lat1 = ($lat1 * pi() ) / 180;
    $lng1 = ($lng1 * pi() ) / 180;

    $lat2 = ($lat2 * pi() ) / 180;
    $lng2 = ($lng2 * pi() ) / 180;

    $calcLongitude = $lng2 - $lng1;
    $calcLatitude = $lat2 - $lat1;
    $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
    $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
    $calculatedDistance = $earthRadius * $stepTwo;

    return round($calculatedDistance);
}

//socket消息
function socketMessage($content, $adminid = 'admin'){
    \Org\Util\Curl::get("http://112.124.116.14:2121/?type=publish&to={$adminid}&content={$content}");
}

//时间状态
function runMarketingStatusStr($starttime, $endtime){
    $time = time();
    if($time < $starttime){
        return '未开始';
    }elseif($time > $endtime){
        return '已结束';
    }else{
        return '进行中';
    }
}

//范围时间转换成数组
function range_date_to_int($str){
    $date = explode('到', $str);
    if(count($date) == 2){
        foreach ($date as $key=>$value) {
            $date[$key] = strtotime(str_replace(' ', '', $value));
        }
        $date[1] = strtotime('+86399 seconds', $date[1]);
        return $date;
    }else{
        failed('时间错误');
    }
}

//范围时间转换成字符串
function range_date_to_str($int1, $int2){
    return date('Y/m/d', $int1).' - '.date('Y/m/d', $int2);
}