<?php
/**
 * Created for moneplus.
 * User: tonghe.wei@moneplus.cn
 * Date: 2016/7/12
 * Time: 17:36
 */

echo "\u{aa}";
echo "\u{0000aa}";
echo "\u{9999}";
echo "\n";
echo '7 、 Unicode codepoint 转译语法

这接受一个以16进制形式的 Unicode codepoint，并打印出一个双引号或heredoc包围的 UTF-8 编码格式的字符串。 可以接受任何有效的 codepoint，并且开头的 0 是可以省略的。

echo "\u{aa}";
echo "\u{0000aa}";
echo "\u{9999}";
以上例程会输出：

ª
ª (same as before but with optional leading 0\'s)
香';