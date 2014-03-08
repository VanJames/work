<?php
header("Content-type: text/html; charset=utf-8"); 
$conn = mysql_connect("localhost","root","root") or die("数据库连接错误");
mysql_select_db("test",$conn) or die ("表名不存在");
$addressCount = mysql_fetch_array(mysql_query("select count(*) from address"));
$newData = array('list' =>array());
$id = 1;
if((int)$addressCount[0] >=5) 
{
	echo "添加数量超限";
	return ;
}
$data = mysql_query("select * from address order by id desc");
while( $value = mysql_fetch_array($data) )
{
	$newData['list'][$value['id']] = array(
		'id' => $value['id'],
		'userId' => $value['userId'],
		'address' => $value['address'],
		'name' => $value['name']
	) ;
}
//max最大地址数，看哪个地址索引没有则添加，从小到大的顺序
function isHaveId($keyId,$arr)
{
	foreach( $arr as $indexId => $value )
		{
			if( $indexId == $keyId )
			{
				return true ;
			}
		}
	return false;
}
if( (int)$addressCount[0] > 0)
{
	for( $i = 1; $i <= 5; $i++ )
	{
		if(!isHaveId( $i , $newData['list'] ))
		{
			$id = $i;
			break;
		}
	}
}
echo mysql_query("insert into address (userid,id,address,name) values ('1000' , '$id' ,'上海市杨浦区国定东路' ,'范旭')")? "添加成功":"Failed";
mysql_close($conn);
?>