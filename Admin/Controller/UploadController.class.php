<?php
namespace Admin\Controller;

use Think\Controller;

class UploadController extends Controller
{
    //文件上传
    public function receive()
    {
        //初始化配置
        $exts = 'jpg,png,gif';
        $config['maxSize'] = '';
        $config['exts'] = explode(',', $exts);
        $config['rootPath'] = 'uploads/';
        $config['subName'] = array('date', 'Ym');

        //目录创建
        if (!is_dir($config['rootPath'])) {
            mkdir($config['rootPath']);
        }

        //开始上传
        $upload = new \Think\Upload($config);
        $result = $upload->uploadOne($_FILES['file']);

        //结果处理
        if ($result) {
            $file['url'] = "/{$config['rootPath']}{$result['savepath']}{$result['savename']}";
            $file['code'] = 0;
        } else {
            $file['info'] = $upload->getError();
            $file['code'] = 1;
        }

        return_json($file);
    }
    
    //ueditor上传接口
    public function ueditor()
    {
        $data = new \Org\Util\Ueditor();
        echo $data->output();
    }
}