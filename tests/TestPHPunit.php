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

	
	public function testDBRetrieval(){
		
		try{
			$conn = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=beerbuddies_db', 'postgres', 'student');
     		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$result = $conn->query("select * from beerbuddies_db.BeerName where \"VCHBEERNAME\"=\"Hocus Pocus\";");
			//$result = pg_query($conn, "select * from beerbuddies_db.beername;");		
			if (!$result){
				exit;	
			}
			if ($result->num_rows > 0){
				//while($row = $result->fetch_assoc()){
				//	echo $row[1];
				//}
				$information = $result->fetch_assoc();
				$info = $information[1];
			}
			$this->assertSame("Hocus Pocus", $info);
			$conn->close();
		}
		catch(PDOException $e){
			echo "error";
		}
		
	}


/*
public function testDBInsert(){
		
		try{
			$conn = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=beerbuddies_db', 'postgres', 'student');
     		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			//$conn->query();
			$result = $conn->query("select * from beerbuddies_db.BeerName where \"VCHBEERNAME\"=\"Hocus Pocus\";");
			//$result = pg_query($conn, "select * from beerbuddies_db.beername;");		
			if (!$result){
				exit;	
			}
			if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					echo $row[1];
				}
			}
			$this->assertSame("Hocus Pocus", $result);
			$conn->close();
		}
		catch(PDOException $e){
			echo "error";
		}
		
	}
}


public function testDBDelete(){
		
		try{
			$conn = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=beerbuddies_db', 'postgres', 'student');
     		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$result = $conn->query("select * from beerbuddies_db.BeerName where \"VCHBEERNAME\"=\"Hocus Pocus\";");
			//$result = pg_query($conn, "select * from beerbuddies_db.beername;");		
			if (!$result){
				exit;	
			}
			if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					echo $row[1];
				}
			}
			$this->assertSame("Hocus Pocus", $result);
			$conn->close();
		}
		catch(PDOException $e){
			echo "error";
		}
		
	}
}



public function testDBUpdate(){
		
		try{
			$conn = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=beerbuddies_db', 'postgres', 'student');
     		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$result = $conn->query("select * from beerbuddies_db.BeerName where \"VCHBEERNAME\"=\"Hocus Pocus\";");
			//$result = pg_query($conn, "select * from beerbuddies_db.beername;");		
			if (!$result){
				exit;	
			}
			if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					echo $row[1];
				}
			}
			$this->assertSame("Hocus Pocus", $result);
			$conn->close();
		}
		catch(PDOException $e){
			echo "error";
		}
		
	}
*/
}


