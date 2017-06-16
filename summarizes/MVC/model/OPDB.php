<?php
include 'ConDB.php';

header("Content-Type:text/html;charset=utf8");

class OPDB
{
    private $obj;
    private $con;

    function __construct()
    {
        $this->obj = new ConDB();
    }

    //插入记录
    //$lib为数据库名称 ; $tab为表名称 ; $params为数据集合
    function add($lib, $tab, $params)
    {
        if (!$this->_ready($lib, $tab)){
            return null;
        };

        if(empty($params)){
            echo 'params is null';
            return false;
        }

        $key = implode(",",array_keys($params));
        $val = "'".implode("','",$params)."'";
        $sql = "insert into $tab($key) values ($val)";
        //return $sql;

        mysql_query($sql, $this->con); //or die (mysql_error());
        $result = mysql_affected_rows($this->con);
        $this->obj->closeCon($this->con);
        return $result;
    }

    //删除记录
    //$where 为条件
    function del($lib, $tab, $where = [])
    {
        if (!$this->_ready($lib, $tab)){
            return null;
        };
//        if (empty($where)) {
//            echo 'where is not null!';
//            return null;
//        }

        $sql = "DELETE FROM $tab ";
        //where 处理
        $where_str = '';
        if (is_array($where)) {
            foreach ($where as $k => $v) {
                if (is_numeric($v)) {
                    $where_str .= $k."=".$v." and ";
                } else {
                    $where_str .= $k."='".$v."' and ";
                }
            }
            $where_str = substr($where_str, 0, strlen($where_str)-5);
        } else {
            $where_str = $where;
        }
        strlen($where_str)!=0 ? $sql .= "where $where_str": true;
        //return $sql;

        mysql_query($sql, $this->con);
        $result = mysql_affected_rows($this->con);
        $this->obj->closeCon($this->con);
        return $result;

    }

    //修改数据
    //$data 为修改数据的键值对 ; $where 为条件
    function update($lib, $tab, $data = [], $where = [])
    {
        if (!$this->_ready($lib, $tab)) {
            return null;
        };
        if (empty($data) || !is_array($data)) {
            echo 'data is not null and data must be an array!';
            return null;
        }
        //data 处理
        $sql = "UPDATE $tab ";
        $data_str = 'SET ';
        foreach ($data as $k => $v) {
            $data_str .= $k ."='" .$v."' , ";
        }
        $data_str = substr($data_str, 0, strlen($data_str)-2);
        $sql.=$data_str;
        //where 处理
        $where_str = '';
        if (is_array($where)) {
            foreach ($where as $k => $v) {
                if (is_numeric($v)) {
                    $where_str .= $k."=".$v." and ";
                } else {
                    $where_str .= $k."='".$v."' and ";
                }
            }
            $where_str = substr($where_str, 0, strlen($where_str)-5);
        } else {
            $where_str = $where;
        }
        strlen($where_str)!=0 ? $sql .= "where $where_str": true;
        var_dump($sql);
        //return $sql;

        mysql_query($sql, $this->con);
        $result = mysql_affected_rows($this->con);
        $this->obj->closeCon($this->con);
        return $result;

    }

    //查询记录
    //$lib为数据库名称 ; $tab为表名称 ; $where为查询时的条件
    function sel($lib, $tab, $fields = '*', $where = [], $order = '', $group = '', $having = '', $limit_start = 0, $limit_end = 0)
    {
        if (!$this->_ready($lib, $tab)) {
            return null;
        };
//        if (empty($fields)) {
//            $fields = '*';
//        }
//        if (empty($where)) {
//            echo 'where is not null!';
//            return null;
//        }

        //fields处理
        $sql = "select $fields from $tab ";
        //where 处理
        $where_str = '';
        if (is_array($where)) {
            foreach ($where as $k => $v) {
                if (is_numeric($v)) {
                    $where_str .= $k."=".$v." and ";
                } else {
                    $where_str .= $k."='".$v."' and ";
                }
            }
            $where_str = substr($where_str, 0, strlen($where_str)-5);
        } else {
            $where_str = $where;
        }

        strlen($where_str)!=0 ? $sql .= "where $where_str": true;
        //order 处理
        strlen($order)!=0 ? $sql .= " order by $order": true;
        //group by 处理
        strlen($group)!=0 ? $sql .= " group by $group": true;
        strlen($group)!=0 && strlen($having)!=0 ? $sql .= " having $having": true;
        //$limit 处理
        $limit_start>0 ? $sql .= " limit $limit_start" : true ;
        $limit_start>0 && $limit_end>0 ? $sql .= ",$limit_end" : true;
        //return $sql;

        $this->con = $this->obj->getConnection();
        mysql_select_db($lib, $this->con);
        $result = mysql_query($sql,$this->con);

        if ($result === false) {
            return null;
        }
        while ($arr = mysql_fetch_array($result, MYSQL_ASSOC)) {
            if (empty($arr)) {
                return null;
            }
            $arrs[] = $arr;
        }
        $this->obj->closeCon($this->con);
        if (!isset($arrs)) {
            return null;
        } else {
            return $arrs;
        }
    }

    //ready
    private function _ready($lib, $tab)
    {
        if (empty($lib)) {
            echo 'lib is not null!';
            return null;
        }
        if (empty($tab)) {
            echo 'tab is not null!';
            return null;
        }
        $this->con = $this->obj->getConnection();
        mysql_select_db($lib, $this->con);
        mysql_query("set names utf8;");
        return true;
    }

}
