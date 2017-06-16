<?php
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");  
$bulk = new MongoDB\Driver\BulkWrite;
echo 'it`s mongo!';exit;


//插入数据
$bulk->insert(['x' => 1, 'name'=>'菜鸟教程', 'url' => 'http://www.runoob.com']);
$bulk->insert(['x' => 2, 'name'=>'Google', 'url' => 'http://www.google.com']);
$bulk->insert(['x' => 3, 'name'=>'taobao', 'url' => 'http://www.taobao.com']);
$manager->executeBulkWrite('test.sites', $bulk, $writeConcern);
die(1);


//删除数据
$bulk->delete(['x' => 1], ['limit' => 1, 'offect' => 10]);   // limit 为 1 时，删除第一条匹配数据
// $bulk->delete(['x' => 2], ['limit' => 0]);   // limit 为 0 时，删除所有匹配数据
$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
$result = $manager->executeBulkWrite('test.sites', $bulk, $writeConcern);
die(1);

//更新数据
$bulk->update(
    ['x' => 3],
    ['$set' => ['x' => 2, 'name' => 'Google', 'url' => 'http://www.google.com']],
    ['multi' => false, //是否全部更新
    'upsert' => false]
);
$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
$result = $manager->executeBulkWrite('test.sites', $bulk, $writeConcern);


//查询数据
$filter = ['x' => ['$gt'=>1]];
$filter = [];
$options = [
    // 'projection' => ['_id' => 0],
    'sort' => ['x' => -1],
];
$options = [];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('test.sites', $query);

foreach ($cursor as $document) {
	echo '<pre>';
    print_r($document);
    echo '</pre>';
}



