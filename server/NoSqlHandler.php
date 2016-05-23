<?php
/*
 * ���˽ӿڴ���
 */
 
#created by wadeyu: wadeyu.cnblogs.com

namespace Server;

use NoSql\NoSqlServiceIf;
use NoSql\InvalidParametorException;

class NoSqlHandler implements NoSqlServiceIf{
	private static $_aCache = [];
	public function get($key){
		$key = trim($key);
		if(!$key || (strlen($key) > 255)){
			throw new InvalidParametorException('Keyֵ���Ϸ�');
		}
		return isset(self::$_aCache[$key]) ? self::$_aCache[$key] : 'NULL';
	}
	public function set_($key,$value){
		$key = trim($key);
		$value = (string)$value;
		if(!$key || (strlen($key) > 255) ){
			throw new InvalidParametorException('Keyֵ���Ϸ�');
		}
		self::$_aCache[$key] = $value;
		return true;
	}
	public function incr($key){
		$key = trim($key);
		if(!$key || (strlen($key) > 255) ){
			throw new InvalidParametorException('Keyֵ���Ϸ�');
		}
		if(!isset(self::$_aCache[$key])){
			self::$_aCache[$key] = 0;
		}
		self::$_aCache[$key]++;
		return self::$_aCache[$key];
	}
}
