<?php
include '../model/OPDB.php';

header("Content-Type:text/html;charset=utf8");

class indexController
{
    public function index()
    {
//        var_dump(urldecode('http%3A%2F%2Fnba.bluewebgame.com%2Foauth_response.php'));
//        exit;
//
//        $openid = isset($_REQUEST['openid'])?$_REQUEST['openid']:'';
//
        $OPDB_obj = new OPDB();
        var_dump($OPDB_obj);exit;
        $lib = 'weixin';
        $tab = 'w_openid';
        $params = [
            'openid' => $openid
//            'b_id'=>'198703',
//            'b_name'=>'jok4',
//            'b_type'=>'jok我的4',
//            'price'=>'2442.89',
//            'num'=>'90',
//            'publish_date'=>date('Y-m-d H:i:s', time()),
        ];
        $where = $params;
        unset($where['b_name']);
        unset($where['b_type']);
        unset($where['num']);
        unset($where['publish_date']);

        $fields = 'b_id';
        $order  = 'b_id desc';
        $group  = '';
        $having = '';
        $limit_start = 1;
        $limit_end   = 2;

        //add
        $result_add = $OPDB_obj->add($lib, $tab, $params);
        if ($result_add>0) {
            //success
            //echo 'add is success,effect is '.$result_add.' row!';
            $this->return_JsonMsg(200, 'add is success,effect is '.$result_add.' row!', ['data'=>$result_add]);
        }
        if ($result_add==0) {
            //none
            //echo 'no data can be add!';
            $this->return_JsonMsg(201, 'no data can be add!', ['data'=>$result_add]);
        }
        if ($result_add==-1) {
            //error
            //echo 'the add of sql is error!';
            $this->return_JsonMsg(202, 'the add of sql is error!', ['data'=>$result_add]);
        }exit;


//        //del
//        $result_del = $OPDB_obj->del($lib, $tab, $where);
//        if ($result_del>0) {
//            //success
//            echo 'del is success,effect is '.$result_del.' row!';
//        }
//        if ($result_del==0) {
//            //none
//            echo 'no data can be del!';
//        }
//        if ($result_del==-1) {
//            //error
//            echo 'the del of sql is error!';
//        }exit;


//        //update
//        $up_data = [
//            'b_name'=>'11哈11',
//            'b_type'=>'222ss22',
//            'num'=>30,
//        ];
//        $up_where = [
//            'b_id'=>'198704',
//        ];
//        $result_update = $OPDB_obj->update($lib, $tab, $up_data, $up_where);
//        var_dump($result_update);
//        if ($result_update>0) {
//            //success
//            echo 'update is success,effect is '.$result_update.' row!';
//        }
//        if ($result_update==0) {
//            //none
//            echo 'no data can be update!';
//        }
//        if ($result_update==-1) {
//            //error
//            echo 'the update of sql is error!';
//        }exit;


//        //sel
//        $lib = 'test';
//        $tab = 'test';
//        //$fields = 'count(*) as total';
//        $fields = '*';
//        $where_str = "101";
//        $where = [
//            'card_id' => ($where_str),
//           //'name' => 'c'
//        ];
//        $result_sel = $OPDB_obj->sel($lib, $tab, $fields, $where, '', '', '', 0, 0);
//        var_dump($result_sel);exit;
//
//        echo "<pre>";
//        print_r($this->handler($result_sel));

    }

    function return_JsonMsg($code='', $message='', $data=[])
    {
        $rs_arr = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
        die(json_encode($rs_arr));
    }

    /**
     * 树型数据表结果集处理
     * @param string $result_sel 结果
     */
    public function handler($result_sel) {
        $already = [];
        $tmps = [];
        foreach ($result_sel as $node) {
            $tmp[$node['pid']][] = $node;
        }
        krsort($tmp);
        for ($i = count($tmp); $i > 0; $i--) {
            foreach ($tmp as $k => $v) {
                if (!in_array($k, $already)) {
                    if (!$tmps) {
                        $tmps = array($k, $v);
                        $already[] = $k;
                        continue;
                    } else {
                        foreach ($v as $key => $value) {
                            if ($value['Id'] == $tmps[0]) {
                                $tmp[$k][$key]['child'] = $tmps[1];
                                $tmps = array($k, $tmp[$k]);
                            }
                        }
                    }
                }
            }
        }
        return $tmp[0];
    }
}
(new indexController())->index();
//$obj = new indexController();
//$obj->index();



//接口类
interface a
{
    function a($a);
}

//抽象类
abstract class b
{
    function b(){
        var_dump('i`m b!');
    }

    function bb(){
        var_dump('i`m bb!');
    }
}

//正常的
class i extends b implements a
{
    public $ii;
//    function __contract($i){
//        $this->ii=$i;
//    }
    function __construct($i){
        $this->ii=$i;
    }

    function a($a){
        var_dump($a);
        var_dump($this->ii);
    }

}

//(new i('i`m a!'))->a('i`m ia!');