<?php
/**
 * Created for moneplus.
 * User: tonghe.wei@moneplus.cn
 * Date: 2016/7/12
 * Time: 17:14
 */

function arraysSum(array ...$arrays): array

{

    return array_map(function(array $array): int {

    return array_sum($array);

}, $arrays);

}
print_r(arraysSum([1,2,3], [4,5,6], [7,8,9]));

echo "\n";
echo '2 、返回值类型声明

PHP 7 增加了对返回类型声明的支持。返回类型声明指明了函数返回值的类型。可用的类型与参数声明中可用的类型相同。

<?php

function arraysSum(array ...$arrays): array

{

return array_map(function(array $array): int {

return array_sum($array);

}, $arrays);

}

print_r(arraysSum([1,2,3], [4,5,6], [7,8,9]));

以上例程会输出：

Array

(

[0] => 6

[1] => 15

[2] => 24

)';
