<?php
/**
 * Created for moneplus.
 * User: tonghe.wei@moneplus.cn
 * Date: 2016/7/12
 * Time: 17:25
 */
// Fetches the value of $_GET['user'] and returns 'nobody'
// if it does not exist.
$username = $_GET['user'] ?? 'nobody';
var_dump($username);
// This is equivalent to:
$username = isset($_GET['user']) ? $_GET['user'] : 'nobody';
var_dump($username);
// Coalesces can be chained: this will return the first
// defined value out of $_GET['user'], $_POST['user'], and
// 'nobody'.
$username = $_GET['user'] ?? $_POST['user'] ?? 'nobody';
var_dump($username);
echo "\n";
echo '3 、 null 合并运算符

由于日常使用中存在大量同时使用三元表达式和 isset()的情况， 我们添加了null合并运算符 (??) 这个语法糖。如果变量存在且值不为NULL， 它就会返回自身的值，否则返回它的第二个操作数。';