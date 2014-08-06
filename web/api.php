<?php
define( 'ROOT_DIR' , dirname( dirname( __FILE__ ) ) );
define( 'SERVER_PATH' , ROOT_DIR . '/web/server/' );
define( 'METHOD_PATH' , 'methodPath' );
main();

/**
 * 获取传来的参数
 * @param $key
 * @return null
 */
function _get( $key )
{
	if( isset( $_GET[$key] ) || isset( $_POST[$key] ) )
	{
		return $_GET[$key] ? : $_POST[$key];
	}
	else
	{
		return null;
	}
}

/**
 * 程序主入口
 * @return string
 */
function main()
{
	$returnData = array();
	if( !_get( METHOD_PATH ) )
	{
		echo jsonEncode( $returnData );
	}
	require_once( SERVER_PATH . _get( METHOD_PATH ) . '.php' );
	$returnData = run();
	echo jsonEncode( $returnData );
}

/**
 * @param $data
 * @return string
 */
function jsonEncode( $data )
{
	if( !is_array( $data ) )
	{
		return '';
	}
	return json_encode( $data );
}
?>
