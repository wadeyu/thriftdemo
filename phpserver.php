<?php
/*
 * php¼òµ¥·ş¶Ë½Å±¾
 */
 
#author by wadeyu: wadeyu.cnblogs.com

define('BASE_DIR',dirname(__FILE__) . '/');
define('VENDOR_DIR',BASE_DIR.'vendor/');

use Server\NoSqlHandler;
use NoSql\NoSqlServiceProcessor;
use Thrift\Factory\TBinaryProtocolFactory;
use Thrift\Factory\TTransportFactory;
use Thrift\Server\TServerSocket;
use Thrift\Server\TSimpleServer;

$loader = include_once VENDOR_DIR.'autoload.php';
$loader->addPsr4('Server\\',BASE_DIR.'server/');

include_once BASE_DIR.'server/NoSql/NoSqlService.php';
include_once BASE_DIR.'server/NoSql/Types.php';

$serverTransport = new TServerSocket('localhost',9090);
$clientTransport = new TTransportFactory;
$binaryProtocol  = new TBinaryProtocolFactory;
$nosqlProcessor  = new NoSqlServiceProcessor( new NoSqlHandler );
$simpleServer    = new TSimpleServer(
	$nosqlProcessor,
	$serverTransport,
	$clientTransport,
	$clientTransport,
	$binaryProtocol,
	$binaryProtocol
);
echo "start listening:localhost:9090 \n";
$simpleServer->serve();


