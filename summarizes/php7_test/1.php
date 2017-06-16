<?php
/**
 * Created for moneplus.
 * User: tonghe.wei@moneplus.cn
 * Date: 2016/7/12
 * Time: 17:20
 */

function check(int $bool){

    var_dump($bool);

}

check(1);

check(true);
echo "\n";
echo '1 、标量类型声明

有两种模式 : 强制 ( 默认 ) 和 严格模式。 现在可以使用下列类型参数（无论用强制模式还是严格模式）： 字符串 (string), 整数 (int), 浮点数 (float), 以及布尔值 (bool) 。它们扩充了 PHP5 中引入的其他类型：类名，接口，数组和 回调类型。在旧版中，函数的参数申明只能是 (Array $arr) 、 (CLassName $obj) 等，基本类型比如 Int ， String 等是不能够被申明的

<?php

function check(int $bool){

var_dump($bool);

}

check(1);

check(true);

?>

若无强制类型转换，会输入 int(1)bool(true) 。转换后会输出 bool(true) bool(true)';
?>