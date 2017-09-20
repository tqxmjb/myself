<?php
/**
 * Created for ttt.
 * User: ttt
 * Date: 2017/9/19
 * Time: 12:15
 */
//header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
$rs = file_get_contents('ip.txt');
$rs = explode(PHP_EOL, $rs);
echo '<pre>';//var_dump($rs);exit;
$sql = 'INSERT INTO `iplocate`( `kkk`, `start`, `end`, `addr`) VALUES ';
$step = 10000;$start = 45*10000;$end = $start+$step;
foreach ($rs as $k=>$v){
    if($k<=$start)continue;
    if($k>$end)break;
    $child = explode(' ', $v);
    $str1 = '';$str2 = '';$str3 = '';
    foreach ($child as $kk=>$vv){
        if(strlen($str1)==0&&strlen($str2)==0&&strlen($str3)==0&&strlen($vv)>0){
            $str1 = $vv;continue;
        }
        if(strlen($str1)>0&&strlen($str2)==0&&strlen($str3)==0&&strlen($vv)>0){
            $str2 = $vv;continue;
        }
        if(strlen($str1)>0&&strlen($str2)>0&&strlen($str3)==0&&strlen($vv)>0){
            $str3 = $vv;continue;
        }
        if(strlen($str1)>0&&strlen($str2)>0&&strlen($str3)>0&&strlen($vv)>0){
            $str3 .= ' '.str_replace("'",'"',$vv);continue;
        }
    }
    $sql .= "('$k','$str1','$str2','$str3'), ";
}
$sql = substr($sql,0,strlen($sql)-2).';';
echo $sql;exit;
$pdo = new PDO("mysql:host=127.0.0.1;dbname=iplocate","root","root");
if($pdo -> exec($sql)){
    echo "success";
    echo $pdo -> lastinsertid();
}
exit;
//var_dump($re_arr);
