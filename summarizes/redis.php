<?php 
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->auth('redisPw');
$rs = $redis->keys('*');
if(!$rs)$redis->set('ab',1, 60*5);
echo '<pre>';print_r($rs);
foreach ($rs as $k => $v) {
	print_r($v.':');print_r($redis->get($v));print_r('  ttl:'.$redis->ttl($v));
}
