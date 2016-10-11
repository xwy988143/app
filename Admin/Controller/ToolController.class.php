<?php
//系统工具
namespace Admin\Controller;


class ToolController extends CommonController
{
    //上传的文件
    public function uploadfile()
    {
        if (IS_AJAX) {
            $act = $_GET['act'];
            //文件删除
            if ($act == 'del') {
                $file = $_POST['ids'];
                foreach ($file as $value) {
                    $result = unlink(substr($value, 1));
                }
                $result ? success() : failed();
            }
        }

        $file_list = $this->readFile('uploads/');

        $this->assign('file_list', $file_list);
        $this->display();
    }

    //系统日志
    public function systemlog()
    {
        $act = $_GET['act'];
        //读取日志文件
        if ($act == 'read') {
            $log = file_get_contents(substr($_GET['logurl'], 1));
            echo "<pre>";
            return_json($log);
        }
        if (IS_AJAX) {
            //文件删除
            if ($act == 'del') {
                $file = $_POST['ids'];
                foreach ($file as $value) {
                    if(is_dir(substr($value, 1)) === true){
                        delFileUnderDir(substr($value, 1));
                    }elseif(file_exists(substr($value, 1)) === true){
                        unlink(substr($value, 1));
                    }
                }
                success();
            }
        }

        $file_list = $this->readFile('cache/Logs/');

        $this->assign('file_list', $file_list);
        $this->display();
    }

    //系统配置
    public function systemconfig()
    {
        if (IS_POST) {
            F('systemconfig', $_POST) !== false ? success() : failed();
        } else {
            $debug = array(array('name'=>'开','value'=>'1'),array('name'=>'关','value'=>'0'));
            $this->assign('debug', $debug);

            $verify = array(array('name'=>'启用','value'=>'1'),array('name'=>'关闭','value'=>'0'));
            $this->assign('verify', $verify);

            $this->assign('data', F('systemconfig'));
            $this->display();
        }
    }

    //读取文件列表
    private function readFile($dir)
    {
        $current_path = $dir . $_GET['path'];
        $ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp', 'mp3', 'txt', 'log', 'rar', 'zip');
        $file_list = array();
        if ($handle = opendir($current_path)) {
            $i = 0;
            while (false !== ($filename = readdir($handle))) {
                if ($filename{0} == '.')
                    continue;
                $file = $current_path . "/" . $filename;
                $file_list[$i]['fileurl'] = '/' . $current_path . '/' . $filename;
                $file_list[$i]['dir_path'] = $_GET['path'] . '/' . $filename;
                if (is_dir($file)) {
                    $file_list[$i]['is_dir'] = true;
                    //是否文件夹
                    $file_list[$i]['has_file'] = (count(scandir($file)) > 2);
                    //文件夹是否包含文件
                    $file_list[$i]['filesize'] = 0;
                    //文件大小
                    $file_list[$i]['is_photo'] = false;
                    //是否图片
                    $file_list[$i]['filetype'] = '<a href="' . U('Admin/' . CONTROLLER_NAME . '/' . ACTION_NAME, array('path' => $file_list[$i]['dir_path'])) . '"><i class="fa fa-folder-open"></i>';
                    //文件类别，用扩展名判断
                } else {
                    $file_list[$i]['is_dir'] = false;
                    $file_list[$i]['has_file'] = false;
                    $filesize = filesize($file) / 1024;//kb
                    if ($filesize > 1024) {
                        $filesize = sprintf('%.1f', $filesize / 1024) . 'M';
                    } else {
                        $filesize = sprintf('%.1f', $filesize) . 'kb';
                    }
                    $file_list[$i]['filesize'] = $filesize;
                    $file_list[$i]['dir_path'] = '';
                    $file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    $file_list[$i]['is_photo'] = in_array($file_ext, $ext_arr);
                    if (in_array($file_ext, array('jpg', 'jpeg', 'png', 'bmp', 'gif'))) {
                        $file_ext = '<a href="javascript:;" onclick="imagePreview(\'' . $file_list[$i]['fileurl'] . '\')"><i class="fa fa-image"></i></a>';
                    } elseif (in_array($file_ext, array('log', 'txt'))) {
                        $file_ext = '<a href="' . U('Admin/Tool/systemlog', array('logurl' => $file_list[$i]['fileurl'], 'act' => 'read')) . '" target="_blank"><i class="fa fa-file-text"></i></a>';
                    } elseif (in_array($file_ext, array('mp3'))) {
                        $file_ext = '<i class="fa fa-music"></i>';
                    } else {
                        $file_ext = '<i class="fa fa-question-circle"></i>';
                    }
                    $file_list[$i]['filetype'] = $file_ext;
                }
                $file_list[$i]['filename'] = $filename;
                //文件名，包含扩展名
                $file_list[$i]['datetime'] = date('Y-m-d H:i:s', filemtime($file));
                $filetime[] = $file_list[$i]['datetime'];
                //文件最后修改时间
                $i++;
            }
            closedir($handle);
        }
        array_multisort($filetime, SORT_DESC, SORT_STRING, $file_list);
        return $file_list;
    }
    
    //删除缓存文件
    public function cacheFileDel(){
        if(IS_AJAX){
            delete_cache();
            success();
        }
    }

}