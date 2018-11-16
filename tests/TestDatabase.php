<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class TestDatabase extends TestCase
{
    use TestCaseTrait;
	
	//only instantiate pdo once for test clean-up/fixture load
	static private $pdo = null;

	//only instantiate once per test
	private $conn = null;

    /**
     * @return PHPUnit\DbUnit\Database\Connection
     */
    final public function getConnection()
    {
		if($this
        $pdo = new PDO('pgsql:host=localhost;dbname=beerbuddies_db', 'root','student');
        return $this->createDefaultDBConnection($pdo, ':beerbuddies_db:');
    }

    /**
     * @return PHPUnit\DbUnit\DataSet\IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/guestbook-seed.xml');
    }
}
