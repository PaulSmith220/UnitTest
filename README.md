UnitTest
========

Unit-Testing Engine



Instruction
========

include "roottest.php"
include "yourclass.php"

########################################################
class MyTest extends testModule
{
	function __construct()
	{
		$this->object = new yourclass();
	}

	function test1(){   // This is a simple test
		$this->assertTrue($this->object->yourClassMethod(param1,param2,...));
	}
	function test2(){
		$this->assertInt($this->object->yourClassOption);
	}

	....
}

$test new MyTest();
$test->startTesting();

########################################################

You could see all testing methods:

get_class_methods('testModule');

########################################################