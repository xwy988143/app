<?php

//========基础函数库==================
/**
 * 写日志
 * @param string $filename
 * @param string $text
 * @return int
 */
function write_log($filename = "", $text = "")
{
    $path = LOG_PATH . 'Error/';
    $filename = $filename . '/';
    $fileUrl = $path . $filename . date('Ymd') . '.log';
    if (!is_dir($path)) {
        mkdir($path);
    } elseif (!is_dir($path . $filename)) {
        mkdir($path . $filename);
    }
    $content = file_get_contents($fileUrl);
    if ($content) {
        $content = "<div>--- start ---\n\n[" . date('Y-m-d H:i:s') . "]\n{$text}\n\n--- end ---\n</div>" . $content;
    } else {
        $content = "<div>--- start ---\n\n[" . date('Y-m-d H:i:s') . "]\n{$text}\n\n--- end ---\n</div><style>*{margin:0;padding:0;}div{background:#666;padding:10px;color:#8BC34A;border-bottom: 1px solid #ccc;}</style>";
    }
    return file_put_contents($fileUrl, $content);
}

/**
 * 成功返回
 * @Date   2015-09-25
 * @param  string $info 提示信息
 * @param  string $url 跳转地址
 * @param  array $data 返回数据
 * @return json           json对象
 */
function success($info = '', $url = '', $data = array())
{
    $d['status'] = 'success';
    $d['info'] = $info ? $info : 'success';
    $d['url'] = $url;
    $d['data'] = $data;
    return_json($d);
}

/**
 * 失败返回
 * @Date   2015-09-25
 * @param  string $info 提示信息
 * @param  string $url 跳转地址
 * @param  array $data 返回数据
 * @return json           json对象
 */
function failed($info = '', $url = '', $data = array())
{
    http_response_code(500);
    $d['status'] = 'failed';
    $d['info'] = $info ? $info : 'failed';
    $d['url'] = $url;
    $d['data'] = $data;
    return_json($d);
}

/**
 * 返回json对象
 * @Date   2015-09-25
 * @param  array $data 数组数据
 * @return json           json对象
 */
function return_json($data)
{
    echo is_array($data) ? json_encode($data) : $data;
    exit;
}

/**
 * 获取客户端地址
 * @Date   2015-09-25
 * @param  string $ip 客户端IP地址
 * @return string         客户端地址
 */
function get_client_address($ip)
{
    $url = "http://ip.taobao.com/service/getIpInfo.php?ip={$ip}";
    $infoJson = \Org\Util\Curl::get($url);
    $infoArray = json_decode($infoJson, true);
    if ($infoArray['code'] === 0) {
        $address = $infoArray['data']['region'] . $infoArray['data']['city'] . $infoArray['data']['isp'];
        return $address;
    }
}

//清除缓存
function delete_cache()
{
    //Cache目录
    $Cache_dir = RUNTIME_PATH . 'Cache/';
    delFileUnderDir($Cache_dir);

    //Temp目录scandir
    $Temp_dir = RUNTIME_PATH . 'Temp/';
    delFileUnderDir($Temp_dir);
}

function delFileUnderDir($dirName, $time = 0)
{
    if ($handle = opendir($dirName)) {
        while (false !== ($item = readdir($handle))) {
            if ($item != "." && $item != "..") {
                if (is_dir("$dirName/$item")) {
                    delFileUnderDir("$dirName/$item", $time);
                } else {
                    if($time==0 || $time>filemtime("$dirName/$item")){
                        unlink("$dirName/$item");
                    }
                }
            }
        }
        closedir($handle);
    }
}

/**
 * 获取datatables分页参数
 * @Date   2015-10-27
 * @return array
 */
function get_page_val()
{
    $post['keyword'] = str_replace("'", "", I('sSearch'));
    $post['page'] = I('iDisplayStart');
    $post['pageSize'] = I('iDisplayLength');
    return $post;
}

/**
 * 设置datatables分页数据
 * @Date   2015-10-27
 * @return json
 */
function set_page_val($array)
{
    $json['iTotalRecords'] = $array['count'];
    $json['iTotalDisplayRecords'] = $array['count'];
    $json['data'] = $array['lists'];
    return json_encode($json);
}

function textarea($text)
{
    $str = str_replace("\r", "", str_replace("\n", ",", $text));
    $arr = explode(',', $str);
    foreach ($arr as $key => $value) {
        $arr[$key] = trim($value);
    }
    return implode(',', array_filter($arr));
}

/**
 * @param $array 需要排序的数组
 * @param $field 需要排序的字段
 * @param bool $sortValue 是否保留排序字段
 * @return mixed 已排序的数组数据
 */
function array_sort($array, $field, $sortValue = true)
{
    $sort = array();
    foreach ($array as $value) {
        $sort[] = $value[$field];
    }
    array_multisort($sort, SORT_ASC, $array);
    if ($sortValue === false) {
        foreach ($array as $key => $value) {
            unset($array[$key][$field]);
        }
    }
    return $array;
}

//返回当前位置与目标位置距离最近排序sql语句
function lbs_sort_sql($lat, $lng)
{
    return "ACOS(SIN(({$lat} * 3.1415) / 180 ) *SIN((lat * 3.1415) / 180 ) +COS(({$lat} * 3.1415) / 180 ) * COS((lat * 3.1415) / 180 ) *COS(({$lng}* 3.1415) / 180 - (lng * 3.1415) / 180 ) ) * 6380 ASC";
}

//path_deny(' ./app / ');
//path_deny(' ./core / ');
//path_deny(' ./cache / ');
//path_deny(' ./data / ');
//apache目录禁止访问
function path_deny($path = '')
{
    $deny = file_get_contents($path . ' . htaccess');
    if ($deny === false || md5($deny) !== 'db289d7dac3de0daf3eaf6dc1a7958d7') {
        $content = "#禁止目录访问\norder allow,deny\ndeny from all";
        file_put_contents($path . ' . htaccess', $content);
    }
}

//计算个人所得税
function taxCal($salary =' ')
{
    switch($salary) 
    {
     case $score>=0 && $score<=1500:
      return $salary * 0.03 - 0;
      break;
     case $score>1500 && $score<=4500:
      return $salary * 0.1 - 105;
      break;
     case $score>4500 && $score<=9000:
      return $salary * 0.2 - 555;
      break;
     case $score>9000 && $score<=35000:
      return $salary * 0.25 - 1005;
      break;
     case $score>35000 && $score<=55000:
      return $salary * 0.3 - 2755;
      break;
     default:
      return false;
    }
}