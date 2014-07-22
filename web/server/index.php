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
	return array(
		array( 'id' => 0 , 'pid' => 0 , 'name' => '关于我' ),
		array( 'id' => 1 , 'pid' => 0 , 'name' => '联系我们' ),
		array( 'id' => 2 , 'pid' => 0 , 'name' => '最新动态' ),
		array( 'id' => 3 , 'pid' => 0 , 'name' => '网络记载' ),
		array( 'id' => 4 , 'pid' => 0 , 'name' => '技术支持' ),
		array( 'id' => 5 , 'pid' => 3 , 'name' => '文章' ),
		array( 'id' => 6 , 'pid' => 3 , 'name' => '图片' ),
		array( 'id' => 7 , 'pid' => 3 , 'name' => '视频' ),
	);
}
?>
