<?php
/**
 * Created for moneplus.
 * User: tonghe.wei@moneplus.cn
 * Date: 2016/7/12
 * Time: 17:32
 */
define('ANIMALS', [
    'dog',
    'cat',
    'bird'
]);

echo ANIMALS[1]; // outputs "cat"
echo "\n";
echo "5 、 通过 define() 定义常量数组

Array 类型的常量现在可以通过 definedefine() 来定义。在 PHP5.6 中仅能通过 const 定义。

<?php
define('ANIMALS', [
    'dog',
    'cat',
    'bird'
]);

echo ANIMALS[1]; // outputs 'cat'
?>";