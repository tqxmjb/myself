<?php
/**
 * Created for moneplus.
 * User: tonghe.wei@moneplus.cn
 * Date: 2016/7/6
 * Time: 16:11
 */
interface Logger {
    public function log(string $msg);
}

class Application {
    private $logger;

    public function getLogger(): Logger { 
      return $this->logger;
   }

   public function setLogger(Logger $logger) {
    $this->logger = $logger;
}
}

$app = new Application;
// 使用 new class 创建匿名类
$app->setLogger(new class implements Logger {
    public function log(string $msg) {
        print($msg);
    }
});

$app->getLogger()->log("我的第一条日志");
?>