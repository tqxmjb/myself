<?php
header("Content-Type:text/html;charset=utf8");
echo "当前目录下所有文件:"."<br>";
function getFiles($path)
{
    foreach(scandir($path) as $a_file) {
        $a_file = iconv("gb2312","UTF-8",$a_file);
        if ($a_file=='.'|| $a_file=='..') continue;
        if (is_dir($path."\\".$a_file)) {
            getFiles($path."\\".$a_file);
        } else {
            echo $path."\\".$a_file.'<br />';
	        echo "CreateTime:".date("Y-m-d H:i:s", filectime($a_file)).'<br />';
            echo "EditTime:".date("Y-m-d H:i:s", filectime($a_file)).'<br /><br />';
        }
    }
}
getFiles(__DIR__);