<?php
use PHPUnit\Framework\TestCase;

class TestPHPunit extends TestCase
{
	public function testPushAndPop(){
		$stack = [];
		$this->assertSame(0, count($stack));

		array_push($stack, 'foo');
		$this->assertSame('foo', $stack[count($stack)-1]);
		$this->assertSame(1, count($stack));

		$this->assertSame('foo', array_pop($stack));
		$this->assertSame(0, count($stack));
	}

	public function testCalculate(){
		$this->assertSame(2,1+1);
	}

	public function testDBResults(){
		$conn = pg_connect("host=127.0.0.1 port=5432 dbname=beerbuddies_db user=postgres password=student");
		if(!$conn) {
				exit;		
		}
		$result = pg_query($conn, "select * from beerbuddies_db.BeerName where \"VCHBEERNAME\"=\"Hocus Pocus\";");
		//$result = pg_query($conn, "select * from beerbuddies_db.beername;");		
		if (!$result){
			exit;	
		}
		
		$this->assertSame("Hocus Pocus", $result);
		
		
	}
}

