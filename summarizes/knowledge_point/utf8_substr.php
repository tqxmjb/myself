<?php
/**
 * Created for moneplus.
 * User: tonghe.wei@moneplus.cn
 * Date: 2016/9/22
 * Time: 12:00
 */

//html标签以及中文字符截取方法

$content = '<html>我爱我家！</html>';
$len = mb_strlen($content, 'utf-8');
//$len = strlen($content);
var_dump($len);
for ($i=1;$i<=$len;$i++){
    var_dump($i);
    var_dump(utf8_substr(($content),0,$i));
}

function utf8_substr($str, $start, $num){
    $res = '';      //存储截取到的字符串
    $cnt = 0;       //计数器，用来判断字符串是否走到$start位置
    $t = 0;         //计数器，用来判断字符串已经截取了$num的数量
    for($i = 0; $i < strlen($str); $i++){
        if(ord($str[$i]) > 127){    //非ascii码时
            if($cnt >= $start){     //如果计数器走到了$start的位置
                $res .=$str[$i].$str[++$i].$str[++$i]; //utf-8是三字节编码，$i指针连走三下，把字符存起来
                $t ++;              //计数器++，表示我存了几个字符串了到$num的数量就退出了
            }else{
                $i++;               //如果没走到$start的位置，那就只走$i指针，字符不用处理
                $i++;
            }
            $cnt ++;
        }else{
            if($cnt >= $start){     //acsii码正常处理就好
                $res .=$str[$i];
                $t++;
            }
            $cnt ++;
        }
        if($num == $t) break;       //ok,我要截取的数量已经够了，我不贪婪，我退出了
    }
    return $res;
}