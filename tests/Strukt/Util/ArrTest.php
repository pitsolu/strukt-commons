<?php

class ArrTest extends PHPUnit\Framework\TestCase{

	public function setUp(){

		$this->rawarr = array(

			"othernames" => "Sander Wellington",
			"surname" => "Johnliver",
			"contact" => array(

				"mobile"=>"+254 712 788 999",
				"address"=>array(

					"home"=>"Westminiser, Long Street, 453, Middlearth",
					"office"=>"Dayriyon, Quadtratic Solusis"
				)
			)
		);

		$this->arr = new \Strukt\Util\Arr($this->rawarr);
	}

	public function testEmpty(){

		$this->assertFalse($this->arr->empty());
	}

	public function testCount(){

		$this->assertTrue($this->arr->only(count($this->rawarr)));
	}

	public function testLast(){

		$last = end($this->rawarr);

		$this->assertEquals($this->arr->last(), $last);
	}

	public function testMap(){

		$arr = $this->arr->map(array(

			"contact_mobile"=>"contact.mobile",
			"contact_address_home"=>"contact.address.home"
		));

		$this->assertEquals(array(

			"contact_mobile"=>$this->rawarr["contact"]["mobile"],
			"contact_address_home"=>$this->rawarr["contact"]["address"]["home"]

		), $arr);
	}
}