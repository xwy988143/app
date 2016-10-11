<?php

namespace Common\Model;
use Think\Model\RelationModel;

class AdminModel extends RelationModel{

    protected $tableName = 'admin';

    protected $_link = array(
        'admin_group'	=>	array(
            'mapping_type'	=>	self::BELONGS_TO,
            'foreign_key'	=>	'group_id',
        ),
        'admin_level' => array(
            'mapping_type' => self::BELONGS_TO,
            'foreign_key'  => 'level_id',
        )
    );
    
    //允许修改的字段
    protected $updateFields = array('password','group_id','level_id','addtime','updatetime','money','money_lock','headimg','sex','age','tel','remark','status_lock');
    
    //验证字段 （必须）
    //验证规则 （必须）
    //提示信息 （必须）
    //验证条件 （可选）
    //附加规则 （可选）
    //验证时间 （可选）1新增数据时2编辑数据时3全部情况下
    //自动验证
    protected $_validate = array(
        array('username','require','请填写账号', 1, '',1),
        array('username','require','账号已存在',1,'unique',1),
        array('password','require','请填写密码', 1, '', 1),
        array('group_id','require','请选择分组', 1),
    );
    
    //自动完成
    protected $_auto = array (
        array('addtime','time',1,'function'),
        array('updatetime','time',3,'function'),
        array('password','umd5',3,'callback'),
        array('password','',2,'ignore'),
    );

    protected function umd5() {
        $password = I('password');
        if ($password) {
            return password_md5($password);
        } else {
            return '';
        }
    }

    public function getList($where=array(), $limit='0,10', $order='addtime desc'){
        $result['count'] = $this->where($where)->count();
        $result['list'] = $this->relation(true)->where($where)->limit($limit)->order($order)->select();
        foreach($result['list'] as $key=>$value){
            $result['list'][$key] = $this->cell($value);
        }
        return $result;
    }

    public function cell($cell){
        $cell['sex'] = $cell['sex'] == '2' ? '女' : '男';
        $cell['status_lock'] = $cell['status_lock'] == '1' ? '锁定' : '正常';
        return $cell;
    }
}