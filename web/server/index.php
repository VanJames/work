<?php

/**
 * 运行
 */
function run()
{
    $_result = array(
	    'menu' =>_iniMenu()
    );
	return $_result;
}

function _iniMenu()
{
	$menu =  array(
		array( 'id' => 0 , 'pid' => 0 , 'name' => '关于我' ),
		array( 'id' => 1 , 'pid' => 0 , 'name' => '联系我们' ),
		array( 'id' => 2 , 'pid' => 0 , 'name' => '最新动态' ),
		array( 'id' => 3 , 'pid' => 0 , 'name' => '网络记载' ),
		array( 'id' => 4 , 'pid' => 0 , 'name' => '技术支持' ),
		array( 'id' => 5 , 'pid' => 3 , 'name' => '文章' ),
		array( 'id' => 6 , 'pid' => 3 , 'name' => '图片' ),
		array( 'id' => 7 , 'pid' => 3 , 'name' => '视频' ),
	);
	foreach( array_keys( $menu ) as $key )
	{
		if( $menu[$key]['pid'] == 0 )
		{
			continue;
		}
		appendChildTree( $menu , $menu[$key] );
		unset( $menu[$key] );
	}
	return $menu;
}
function appendChildTree( &$data , $tree )
{
	if( empty( $data ) )
	{
		return false;
	}
	foreach( $data as $key => $val )
	{
		if( $val['id'] == $tree['pid'] )
		{
			$data[$key]['child'][] = $tree;
			return true;
		}
		if( isset( $val['child'] ) && is_array( $val['child'] ) )
		{
			if( appendChildTree( $data[$key]['child'] , $tree ) )
			{
				return true;
			}
		}
	}
	return false;
}
?>
