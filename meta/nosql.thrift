/*
 * thrift简单示例 模仿thrift源码教程
 * nosql数据库简单实现
 */
 
#由wadeyu创建 wadeyu.cnblogs.com

/**
 * 命名空间
 */
namespace cpp NoSql
namespace java NoSql
namespace php NoSql

/**
 * 异常:无效参数
 */
exception InvalidParametorException{
}

/**
 * 定义服务
 */
service NoSqlService{
	/**
	 * 获取key的值
	 */
	string get(1:string key) throws (1:InvalidParametorException ex),
	
	/**
	 * 设置值
	 */
	bool set_(1:string key, 2:string value) throws (1:InvalidParametorException ex),
	
	/**
	 * 自增
	 */
	i32 incr(1:string key) throws (1:InvalidParametorException ex),
}
 
 