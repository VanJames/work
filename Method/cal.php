<?php
/**
		*Author 103(QQ:746439274)
		*1 有五栋五种颜色的房子
		*2 每一位房子的主人国籍都不同
		*3 这五个人每人只喝一种饮料，只抽一种牌子的香烟，只养一种宠物
		*4 没有人有相同的宠物，抽相同牌子的香烟，喝相同的饮料
		*提示：
		*１　 英国人住在红房子里
		*２　 瑞典人养了一条狗
		*３　 丹麦人喝茶
		*４　 绿房子在白房子左边
		*５　 绿房子主人喝咖啡
		*６　 抽ＰＡＬＬ　ＭＡＬＬ烟的人养了一只鸟
		*７　 黄房子主人抽ＤＵＮＨＩＬＬ烟
		*８　 住在中间那间房子的人喝牛奶
		*９　 挪威人住第一间房子
		*10　抽混合烟的人住在养猫人的旁边
		*11　养马人住在抽ＤＵＮＨＩＬＬ烟的人旁边
		*12　抽ＢＬＵＥ　ＭＡＳＴＥＲ烟的人喝啤酒
		*13　德国人抽ＰＲＩＮＣＥ烟
		*14　挪威人住在蓝房子旁边
		*15　抽混合烟的人的邻居喝矿泉水
		*问题是：谁养鱼？？？
		*编程来实现这个题的判断？
		*此算法有待改进,希望大神牛人完善,共享学习
**/
//开始计算
Compute::getInstance()->run();
/**
 * 人类 
 * @Author 103( QQ:746439274 )
 * Class People
 * 
 */
class People{
    private $_house;
    private $_drink;
    private $_smoke;
    private $_pet;
    private $_country;
    private $_id;

    /**
     * @return mixed
     */
    public function getHouse()
    {
        return $this->_house;
    }

    /**
     * @param mixed $house
     */
    public function setHouse($house)
    {
        $this->_house = $house;
    }

    /**
     * @return mixed
     */
    public function getDrink()
    {
        return $this->_drink;
    }

    /**
     * @param mixed $drink
     */
    public function setDrink($drink)
    {
        $this->_drink = $drink;
    }

    /**
     * @return mixed
     */
    public function getSmoke()
    {
        return $this->_smoke;
    }

    /**
     * @param mixed $smoke
     */
    public function setSmoke($smoke)
    {
        $this->_smoke = $smoke;
    }

    /**
     * @return mixed
     */
    public function getPet()
    {
        return $this->_pet;
    }

    /**
     * @param mixed $pet
     */
    public function setPet($pet)
    {
        $this->_pet = $pet;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->_country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->_country = $country;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    public function __construct( $id ){
        $this->_id = $id;
    }
}

/**
 * 模拟条件计算类
 * @Author 103( QQ:746439274 )
 * Class Compute
 */
class Compute{
    private $_houses = array(
        'hongse',//红色
        'huangse' ,
        'baise' ,
        'lvse' ,
        'lanse' ,
    );
    private $_houseName = array(
        'hongse' => '红色',
        'huangse' => '黄色',
        'baise' => '白色',
        'lvse' => '绿色',
        'lanse' => '蓝色',
    );
    private $_drinks = array(
        'niunai' ,//牛奶
        'shui' ,
        'kafei'  ,
        'pijiu'  ,
        'cha' ,
    );
    private $_drinkName = array(
        'niunai' => '牛奶' ,//牛奶
        'shui' => '水',
        'kafei' =>'咖啡',
        'pijiu'  =>'啤酒',
        'cha' =>'茶',
    );
    private $_countries = array(
        'yingguo' ,//英国
        'nuowei' ,
        'danmai'  ,
        'ruidian' ,
        'deguo' ,
    );
    private $_countryName = array(
        'yingguo' => '英国',//英国
        'nuowei' =>'挪威',
        'danmai'  =>'丹麦',
        'ruidian' =>'瑞典',
        'deguo' =>'德国',
    );
    private $_pets = array(
        'gou' ,//狗
        'mao'  ,
        'yu'  ,
        'niao' ,
        'ma'  ,
    );
    private $_petName = array(
        'gou' => '狗',//狗
        'mao' => '猫' ,
        'yu'  =>'鱼',
        'niao' =>'鸟',
        'ma' => '马' ,
    );
    private $_smokes = array(
        'PM' ,//首字母缩写
        'DH' ,
        'BM' ,
        'PR' ,
        'HH' ,
    );
    private $_smokeName = array(
        'PM' => 'ＰＡＬＬ　ＭＡＬＬ',//首字母缩写
        'DH' => 'ＤＵＮＨＩＬＬ',
        'BM' => 'ＢＬＵＥ　ＭＡＳＴＥＲ',
        'PR' => 'ＰＲＩＮＣＥ',
        'HH' => '混合烟',
    );
    
    private $_peoples = array();
    private $_result = false;
    private static $_singleInstance = null;
    private $sum = 0;
    const NUMBER = 5;
    public function __construct()
    {
        //初始化5个人
        for( $i = 0 ; $i < self::NUMBER ; $i++ ){
            $this->_peoples[$i] = new People( $i );
        }
    }
    
    public static function getInstance(){
        if( self::$_singleInstance == null || !( self::$_singleInstance instanceof self ) ){
            self::$_singleInstance = new self();
        }
        return self::$_singleInstance;
    }
    
    //运行程序
    public function run(){
	    echo "<meta content='charset=utf8'  />";
        ini_set( 'max_execution_time' , 864000 );
	    $startTime = microtime( true );
        $this->_calculate();
	    $endTime = microtime( true );
	    echo '是否找到结果 ?' .$this->_result ? '找到结果' : '没找到结果' ;
	    if( !$this->_result )
	    {
		    exit;
	    }
	    echo "<br>";
        echo '查询次数:' . (integer)$this->sum . '次|耗时:' . round( ( $endTime - $startTime ) * 1000 , 2 ) . 's';
	    echo "<br><table><tr>";
	    echo '<td>|房子位置:' . '|<br>'
		    . '|房子颜色:' . '|<br>'
		    . '|人物国籍:'  . '|<br>'
		    . '|喝的饮料:' . '|<br>'
		    . '|养的宠物:'. '|<br>'
		    . '|抽的香烟:|';
        foreach( $this->_peoples as $people ){
            echo '<td>' . ( $people->getId() + 1 ) . '|<br>'
	            . $this->_houseName[$people->getHouse()] . '|<br>'
	            . $this->_countryName[$people->getCountry()] . '|<br>'
	            . $this->_drinkName[$people->getDrink()] . '|<br>'
	            . $this->_petName[$people->getPet()] . '|<br>'
	            . $this->_smokeName[$people->getSmoke()] . '|';
            echo "</td>";
        }
	    echo "</tr></table>";
    }

    //初始化5个人类相关属性
    private function init(){
        $i = 0;
        foreach( $this->_countries as $country ){
            $this->_peoples[$i++]->setCountry( $country );
        }
        $i = 0;
        foreach( $this->_houses as $house ){
            $this->_peoples[$i++]->setHouse( $house );
        }
        $i = 0;
        foreach( $this->_drinks as $drink ){
            $this->_peoples[$i++]->setDrink( $drink );
        }
        $i = 0;
        foreach( $this->_pets as $pet ){
            $this->_peoples[$i++]->setPet( $pet );
        }
        $i = 0;
        foreach( $this->_smokes as $smoke ){
            $this->_peoples[$i++]->setSmoke( $smoke );
        }
    }
    private function _calculate(){
        //排列组合各种情况排除法5个数的排列方式120种，因此大概循环120的5次方
		$smokesArr = $this->_paiLie( $this->_smokes , 'smoke' );
	    $countriesArr = $this->_paiLie( $this->_countries , 'country' );
	    $housesArr = $this->_paiLie( $this->_houses , 'house' );
		$petsArr = $this->_paiLie( $this->_pets , 'pet' );
		$drinksArr = $this->_paiLie( $this->_drinks , 'drink' );
	    foreach( $smokesArr as $smokes )
	    {
		    foreach( $countriesArr as $countries )
		    {
			    foreach( $housesArr as $houses )
			    {
				    foreach( $petsArr as $pets )
				    {
					    foreach( $drinksArr as $drinks )
					    {
						    $this->_countries = $countries;
						    $this->_houses = $houses;
						    $this->_drinks = $drinks;
						    $this->_pets = $pets;
						    $this->_smokes = $smokes;
						    $this->init();
						    $this->doCheck();
						    if( $this->_result )
						    {
							    return;
						    }
						    $this->sum++;
					    }
				    }
			    }
		    }
	    }
    }

	//返回数组的不重复排列集合
	private function _paiLie( $List , $type )
	{
		if( $List == null )
		{
			return array( "" );
		}
		foreach( $List as $Header )
		{
			foreach( $this->_paiLie( $this->_checkSame( $List , $Header ) , 'none' ) as $Temp )
			{
				$arr = ( is_array( $Temp ) )
					? array_merge( array( $Header ) , $Temp ) : ( ( $Temp
						!= '' ) ? array( $Header , $Temp ) : $Header );
				switch( $type )
				{
					case 'pet':
						foreach( $arr as $id => $pet ){
							if( $pet == 'gou' && $id != 0 ){
								$result[] = $arr;
							}
						}
						break;
					//中间的房间人喝牛奶 绿房子喝咖啡
					case 'drink':
						if( $arr[2] == 'niunai' && $arr[3] == 'kafei' )
						{
							$result[] = $arr;
						}
						break;
					//挪威人住第一间房子
					case 'country':
						if( $arr[0] == 'nuowei' )
						{
							$result[] = $arr;
						}
						break;
					//黄房子主人抽ＤＵＮＨＩＬＬ烟，黄房子只可能第一间或第三间
					case 'smoke':
						$isOk = true;
						foreach( $arr as $id => $smoke ){
							if( $smoke == 'DH' && !in_array( $id , array( 0 , 2 ) ) ){
								$isOk = false;
								break;
							}
							if( $smoke == 'PR' && $id == 0 ){
								$isOk = false;
								break;
							}
						}
						if( $isOk ){
							$result[] = $arr;
						}
						break;
					//绿房子在白房子左边 -- 挪威人住在蓝房子旁边，绿房子只可能是第三或者第四间,中间房间人和牛奶，绿房间喝咖啡，绿房间是第四间
					case 'house':
						if( $arr[1] == 'lanse' && $arr[3] == 'lvse' && $arr[4] == 'baise' )
						{
							$result[] = $arr;
						}
						break;
					default:
						$result[] = $arr;
						break;
				}

			}
		}
		return $result;
	}

    //检查条件
    public function doCheck(){
        foreach( $this->_peoples as $id => $people ){
            //英国人住红色房子
            if( $people->getHouse() == 'hongse' && $people->getCountry() != 'yingguo' )
            {
                return $this->_result = false;
            }
            //瑞典人养了一条狗
            if( $people->getCountry() == 'ruidian' && $people->getPet() != 'gou' )
            {
                return $this->_result = false;
            }
            //丹麦人喝茶
            if( $people->getCountry() == 'danmai' && $people->getDrink() != 'cha' )
            {
                return $this->_result = false;
            }

            //抽ＰＡＬＬ　ＭＡＬＬ烟的人养了一只鸟
            if( $people->getSmoke() == 'PM' && $people->getPet() != 'niao' )
            {
                return $this->_result = false;
            }

            //抽混合烟的人住在养猫人的旁边
            if( $people->getSmoke() == 'HH' )
            {
                if( $id == 0 )
                {
                    if( $this->_peoples[$id+1]->getPet() != 'mao' ){
                        return $this->_result = false;
                    }
                }
                else if( $id == 4 ){
                    if( $this->_peoples[$id-1]->getPet() != 'mao' ){
                        return $this->_result = false;
                    }
                }
                else{
                    if( $this->_peoples[$id+1]->getPet() != 'mao' && $this->_peoples[$id-1]->getPet() != 'mao' ){
                        return $this->_result = false;
                    }
                }
            }
            //养马人住在抽ＤＵＮＨＩＬＬ烟的人旁边 抽DH的是黄房子
            if( $people->getPet() == 'ma' )
            {
                if( $id == 0 )
                {
                    if( $this->_peoples[$id+1]->getSmoke() != 'DH' || $this->_peoples[$id+1]->getHouse() != 'huangse' ){
                        return $this->_result = false;
                    }
                }
                else if( $id == 4 ){
                    if( $this->_peoples[$id-1]->getSmoke() != 'DH' || $this->_peoples[$id-1]->getHouse() != 'huangse' ){
                        return $this->_result = false;
                    }
                }
                else{
                    if( ( $this->_peoples[$id+1]->getSmoke() != 'DH' || $this->_peoples[$id+1]->getHouse() != 'huangse' )
	                    && ( $this->_peoples[$id-1]->getSmoke() != 'DH' || $this->_peoples[$id-1]->getHouse() != 'huangse' ) ){
                        return $this->_result = false;
                    }
                }
            }
            //抽ＢＬＵＥ　ＭＡＳＴＥＲ烟的人喝啤酒
            if( $people->getSmoke() == 'BM' && $people->getDrink() != 'pijiu' )
            {
                return $this->_result = false;
            }
            //德国人抽ＰＲＩＮＣＥ烟
            if( $people->getCountry() == 'deguo' && $people->getSmoke() != 'PR' )
            {
                return $this->_result = false;
            }
            //抽混合烟的人的邻居喝矿泉水
            if( $people->getSmoke() == 'HH' )
            {
                if( $id == 0 )
                {
                    if( $this->_peoples[$id+1]->getDrink() != 'shui' ){
                        return $this->_result = false;
                    }
                }
                else if( $id == 4 ){
                    if( $this->_peoples[$id-1]->getDrink() != 'shui' ){
                        return $this->_result = false;
                    }
                }
                else{
                    if( $this->_peoples[$id+1]->getDrink() != 'shui' && $this->_peoples[$id-1]->getDrink() != 'shui' ){
                        return $this->_result = false;
                    }
                }
            }
        }
        return $this->_result = true;
    }
    //检查是否重复
    private function _checkSame( $a1 , $a2 )
     {
         unset( $a1[array_search( $a2 , $a1 ) ] );
         return $a1;
     }
}
?>
