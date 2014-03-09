<?php 
$data = array('0' => array(
		'id' => "1" ,
		'name' => 'fx' ) ,
		'1' => array(
		'id' => '2' ,
		'name' => 'fyy',
		'0' => '3' ,
		'2' => '4' ));
//测试array_merge函数
$data1 = array( '0' => "1" );
echo "array_merge输出结果：";
print_r(array_merge($data,$data1));
echo "<br>+输出结果：";
print_r($data+$data1);
//测试array_change_key_case函数,当key值是字母时才有用
//print_r(array_change_key_case($data,CASE_UPPER));
//测试array_shift函数
function TestArray_Shift( &$data )
{
	return array_shift($data);
}
//echo json_encode(TestArray_Shift($data)) ;
//echo json_encode($data) ;
//测试Array_Key_Exists函数
function TestArray_ExistKey( $key , $data )
{	
	if(array_key_exists( $key , $data ))
	{
		echo "可以利用array_key_exists函数" ;
	}
	else
	{
		echo "不可以利用array_key_exists函数查找" ;
	}
}
//echo "测试二维数组内层行key值结果：";
//TestArray_ExistKey( "2" , $data );
//echo "<br>测试二维数组外层行key值结果：";
//TestArray_ExistKey( "1" , $data );
//自动加载类
function __autoload($className)
{
	$file = $className.".php";
	if(is_file($file))
	{
		require_once($file);
	}
}
function TestRegisterOnLoad()
{
	HelloWord::showTip();
	echo "<br>";
	$obj = new HelloWord;
	$obj -> display();
}
?> 