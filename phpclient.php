<?php
/*
 * php简单客户端脚本
 */
 
#author by wadeyu: wadeyu.cnblogs.com

define('BASE_DIR',dirname(__FILE__) . '/');
define('VENDOR_DIR',BASE_DIR.'vendor/');

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use NoSql\NoSqlServiceClient;

$loader = include_once VENDOR_DIR.'autoload.php';

include_once BASE_DIR.'client/NoSql/NoSqlService.php';
include_once BASE_DIR.'client/NoSql/Types.php';

$transport = new TSocket('localhost',9090);
$protocol  = new TBinaryProtocol($transport);
$service   = new NoSqlServiceClient($protocol);
$startTime = microtime(true);
try{
	$transport->open();
	$key1 = 'test1';
	$ret = $service->get($key1);
	var_dump($ret);
	$ret = $service->set_($key1,'test1');
	var_dump($ret);
	$key2 = 'test2';
	$ret = $service->incr($key2);
	var_dump($ret);
	$transport->close();
}catch(Exception $ex){
	throw $ex;
}
var_dump('cost:'.(microtime(true)-$startTime));